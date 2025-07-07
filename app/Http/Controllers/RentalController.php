<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class RentalController extends Controller
{
    public function index()
    {
        return view('rental');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'tanggal_sewa' => 'required|date',
            'waktu_mulai' => 'required',
            'durasi' => 'required|integer|min:1',
            'tipe_mobil' => 'required',
            'harga' => 'required|numeric',
            'total_harga' => 'required|numeric',
        ]);

        try {
            // Simpan data rental ke database
            $rental = Rental::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'tanggal_sewa' => $request->tanggal_sewa,
                'waktu_mulai' => $request->waktu_mulai,
                'durasi' => $request->durasi,
                'tipe_mobil' => $request->tipe_mobil,
                'harga' => $request->harga,
                'total_harga' => $request->total_harga,
            ]);

            // Buat order untuk pembayaran
            $order = Order::create([
                'rental_id' => $rental->id,
                'amount' => $rental->total_harga,
                'status' => 'pending',
            ]);

            // ✅ Konfigurasi Midtrans (jangan pakai env())
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$clientKey = config('services.midtrans.clientKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            // Siapkan data transaksi Midtrans
            $transaction_details = [
                'order_id' => 'ORDER-' . $order->id . '-' . time(),
                'gross_amount' => (int) $rental->total_harga,
            ];

            $customer_details = [
                'first_name' => $rental->nama,
                'email' => $rental->email,
            ];

            $params = [
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
            ];

            // Ambil Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Simpan snap_token ke order (opsional)
            $order->snap_token = $snapToken;
            $order->save();

            return view('payment', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan rental atau inisiasi pembayaran Midtrans: ' . $e->getMessage(), [
                'request_data' => $request->all()
            ]);
            return back()->with('error', 'Gagal memproses pembayaran. Silakan coba lagi.');
        }
    }
}
