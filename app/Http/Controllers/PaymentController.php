<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Order;
use App\Models\Rental;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Exception;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans dilakukan melalui MidtransServiceProvider
    }

    public function showCheckoutForm()
    {
        return view('checkout');
    }

    public function createPaymentOrderAndGetSnapToken(Request $request)
    {
        $validatedData = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'total_harga' => 'required|numeric|min:1',
            'tipe_mobil' => 'required|string|max:255',
        ]);

        try {
            $rental = Rental::findOrFail($validatedData['rental_id']);
            $midtransOrderId = 'INV-' . $rental->id . '-' . time();

            $order = Order::create([
                'order_id' => $midtransOrderId,
                'rental_id' => $rental->id,
                'user_id' => Auth::check() ? Auth::id() : null,
                'amount' => $rental->total_harga,
                'status' => 'pending',
                'midtrans_transaction_id' => null,
                'payment_type' => null,
                'gross_amount' => $rental->total_harga,
                'status_detail' => 'pending',
                'raw_response' => null,
                'rental_data' => $rental->toArray(),
            ]);

            $rental->pg_transaction_id = $midtransOrderId;
            $rental->save();

            $transaction_details = [
                'order_id' => $order->order_id,
                'gross_amount' => $order->amount,
            ];

            $customer_details = [
                'first_name' => $rental->nama,
                'email' => $rental->email,
            ];

            $item_details = [[
                'id' => 'RENTAL-' . $rental->id,
                'price' => $rental->total_harga,
                'quantity' => 1,
                'name' => 'Sewa Mobil ' . $rental->tipe_mobil . ' (' . $rental->durasi . ' Hari)',
            ]];

            $snap_params = [
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
                'callbacks' => [
                    'finish' => route('payment.orderStatus', ['orderId' => $order->order_id]),
                    'error' => route('payment.orderStatus', ['orderId' => $order->order_id]),
                    'pending' => route('payment.orderStatus', ['orderId' => $order->order_id]),
                ],
            ];

            $snapToken = Snap::getSnapToken($snap_params);

            return response()->json(['snap_token' => $snapToken, 'order_id' => $order->order_id]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation Error in createPaymentOrderAndGetSnapToken: ' . $e->getMessage(), $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            Log::error('Midtrans Snap Error in createPaymentOrderAndGetSnapToken: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Gagal memproses pembayaran. Silakan coba lagi.'], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        Log::info('Midtrans Webhook Callback Received: ', $request->all());

        try {
            $notif = new Notification();

            $transactionStatus = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status;
            $orderId = $notif->order_id;

            Log::info("Midtrans Callback Processing for Order ID: {$orderId}, Status: {$transactionStatus}, Fraud: {$fraudStatus}");

            $order = Order::where('order_id', $orderId)->first();

            if (!$order) {
                Log::warning('Midtrans Callback: Order not found for ID ' . $orderId);
                return response()->json(['message' => 'Order not found'], 404);
            }

            $order->raw_response = $notif->toJson();

            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    $order->status = 'challenge';
                    $order->status_detail = 'challenge';
                } elseif ($fraudStatus == 'accept') {
                    $order->status = 'success';
                    $order->status_detail = 'settlement';
                }
            } elseif ($transactionStatus == 'settlement') {
                $order->status = 'success';
                $order->status_detail = 'settlement';
            } elseif ($transactionStatus == 'pending') {
                $order->status = 'pending';
                $order->status_detail = 'pending';
            } elseif ($transactionStatus == 'deny') {
                $order->status = 'failed';
                $order->status_detail = 'denied';
            } elseif ($transactionStatus == 'expire') {
                $order->status = 'failed';
                $order->status_detail = 'expired';
            } elseif ($transactionStatus == 'cancel') {
                $order->status = 'failed';
                $order->status_detail = 'cancelled';
            }

            $order->midtrans_transaction_id = $notif->transaction_id;
            $order->payment_type = $notif->payment_type;
            $order->gross_amount = $notif->gross_amount;
            $order->save();

            $rental = $order->rental;
            if ($rental) {
                $rental->status_transaksi = $order->status;
                $rental->status_pembayaran = $order->status;
                $rental->midtrans_transaction_id = $order->midtrans_transaction_id;
                $rental->payment_type = $order->payment_type;
                $rental->gross_amount = $order->gross_amount;
                $rental->raw_response = $order->raw_response;
                $rental->save();
                Log::info("Rental ID {$rental->id} status updated based on Order ID {$orderId} to: {$rental->status_transaksi}");
            } else {
                Log::warning('Midtrans Callback: Associated Rental not found for Order ID ' . $orderId);
            }

            return response()->json(['message' => 'Callback received successfully'], 200);

        } catch (Exception $e) {
            Log::error('Error processing Midtrans callback: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Error processing callback'], 500);
        }
    }

    public function showOrderStatus($orderId)
    {
        $order = Order::where('order_id', $orderId)->firstOrFail();
        $rental = $order->rental;
        return view('order-status', compact('order', 'rental'));
    }
}