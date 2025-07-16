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
    // ✅ Untuk halaman /rental
    public function index()
    {
        return view('rental');
    }

    // ✅ Menyimpan data rental & redirect ke in voice
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

            // ✅ Konfigurasi Midtrans
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$clientKey = config('services.midtrans.clientKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            // Data transaksi Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $order->id . '-' . time(),
                    'gross_amount' => (int) $rental->total_harga,
                ],
                'customer_details' => [
                    'first_name' => $rental->nama,
                    'email' => $rental->email,
                ],
            ];

            // Snap Token
            $snapToken = Snap::getSnapToken($params);
            $order->snap_token = $snapToken;
            $order->save();

            // ✅ Redirect ke halaman invoice
            return redirect()->route('invoice.show', $rental->id);

        } catch (\Exception $e) {
            Log::error('Gagal menyimpan rental atau memulai pembayaran: ' . $e->getMessage(), [
                'request_data' => $request->all()
            ]);
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // ✅ Menampilkan invoice berdasarkan ID rental
    public function showInvoice($id)
    {
        $rental = Rental::findOrFail($id);

        $mobil = $rental->tipe_mobil;
        $harga = $rental->total_harga / $rental->durasi;
        $total = $rental->total_harga;
        $invoice = 'INV' . str_pad($rental->id, 9, '0', STR_PAD_LEFT);
        $batasWaktu = now()->addDay()->format('d F Y, H:i') . ' WIB';

        return view('invoice', compact('rental', 'mobil', 'harga', 'total', 'invoice', 'batasWaktu'));
    }
}
