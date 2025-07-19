<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification; // Pastikan ini di-import

class PaymentController extends Controller
{
    /**
     * Menangani notifikasi webhook dari Midtrans.
     * Ini akan dipanggil oleh server Midtrans secara otomatis.
     */
    public function handleCallback(Request $request)
    {
        // 1. Set Midtrans configuration (sama seperti di RentalController)
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true; // Notifikasi harus selalu disanitasi
        Config::$is3ds = true;

        try {
            $notification = new Notification();

            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id;
            $fraudStatus = $notification->fraud_status;

            // TODO: (SANGAT PENTING!)
            // Ambil data rental dari database Anda berdasarkan $orderId
            // Contoh: $rentalOrder = \App\Models\RentalOrder::where('order_id', $orderId)->first();

            // Jika $rentalOrder tidak ditemukan, log dan keluar.
            // if (!$rentalOrder) {
            //     \Log::error("Midtrans notification: Order ID not found in database: " . $orderId);
            //     return response('Order not found', 404);
            // }

            // Log detail notifikasi untuk debugging
            \Log::info("Midtrans Notification received for Order ID: {$orderId}, Status: {$transactionStatus}, Fraud: {$fraudStatus}");

            // 2. Proses status transaksi
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    // TODO: Status transaksi challenge, update status di DB: 'challenge'
                    // $rentalOrder->update(['payment_status' => 'challenge']);
                } else if ($fraudStatus == 'accept') {
                    // TODO: Status transaksi berhasil (capture), update status di DB: 'paid' / 'success'
                    // $rentalOrder->update(['payment_status' => 'paid']);
                }
            } else if ($transactionStatus == 'settlement') {
                // TODO: Status transaksi berhasil (settlement), update status di DB: 'paid' / 'success'
                // $rentalOrder->update(['payment_status' => 'paid']);
            } else if ($transactionStatus == 'pending') {
                // TODO: Status transaksi pending, update status di DB: 'pending'
                // $rentalOrder->update(['payment_status' => 'pending']);
            } else if ($transactionStatus == 'deny') {
                // TODO: Status transaksi ditolak, update status di DB: 'denied'
                // $rentalOrder->update(['payment_status' => 'denied']);
            } else if ($transactionStatus == 'expire') {
                // TODO: Status transaksi kadaluarsa, update status di DB: 'expired'
                // $rentalOrder->update(['payment_status' => 'expired']);
            } else if ($transactionStatus == 'cancel') {
                // TODO: Status transaksi dibatalkan, update status di DB: 'canceled'
                // $rentalOrder->update(['payment_status' => 'canceled']);
            }

            return response('OK', 200); // Beri respons OK ke Midtrans

        } catch (Exception $e) {
            \Log::error('Error processing Midtrans notification: ' . $e->getMessage(), ['exception' => $e, 'request_data' => $request->all()]);
            return response('Error', 500); // Beri respons Error jika ada masalah
        }
    }

    /**
     * Menampilkan halaman status pesanan kepada pengguna.
     */
    public function showOrderStatus($orderId)
    {
        // TODO: (Direkomendasikan) Ambil status pembayaran dari database Anda
        // $rentalOrder = \App\Models\RentalOrder::where('order_id', $orderId)->first();
        // $status = $rentalOrder ? $rentalOrder->payment_status : 'unknown';

        // Untuk contoh sederhana, kita hanya menampilkan Order ID
        return view('order_status', compact('orderId'));
    }
}