<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Exception; // Tambahkan ini untuk menangkap Exception dengan lebih spesifik

class RentalController extends Controller
{
    /**
     * Menampilkan halaman daftar mobil rental.
     * Kode HTML untuk daftar mobil akan berada di view.
     */
    public function index()
    {
        return view('rental'); // Pastikan Anda memiliki resources/views/rental.blade.php
    }

    /**
     * Menginisiasi pembayaran menggunakan Midtrans Snap.
     * Menerima data form rental dari frontend.
     */
    public function initiatePayment(Request $request)
    {
        // 1. Validasi data yang masuk dari request
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tanggal_sewa' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required|date_format:H:i',
            'durasi' => 'required|integer|min:1',
            'tipe_mobil' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
        ]);

        // 2. Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Untuk debug, Anda bisa log nilai-nilai ini ke laravel.log
        \Log::info('DEBUG CHECK: Server Key being used: ' . Config::$serverKey);
        \Log::info('DEBUG CHECK: Is Production flag: ' . (Config::$isProduction ? 'true' : 'false'));

        // 3. Persiapkan detail transaksi untuk Midtrans
        $orderId = 'RENTAL-' . time() . '-' . uniqid(); // Pastikan order ID unik

        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $request->total_harga,
        ];

        $customer_details = [
            'first_name' => $request->nama,
            'email' => $request->email,
            // Anda bisa tambahkan 'phone' jika ada di form
            // 'phone' => $request->phone,
        ];

        $item_details = [
            [
                'id' => 'CAR-' . str_replace(' ', '-', strtolower($request->tipe_mobil)),
                'name' => $request->tipe_mobil . ' Rental',
                'price' => (int)$request->harga, // Pastikan integer
                'quantity' => (int)$request->durasi, // Pastikan integer
                'brand' => 'Pace Rental',
                'category' => 'Car Rental',
                'merchant_name' => 'Pace Rental',
            ]
        ];

        // Gabungkan semua parameter
        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
            // Opsional: callbacks untuk status pembayaran
            // 'callbacks' => [
            //     'finish' => url('/payment-finish'),
            //     'unfinish' => url('/payment-unfinish'),
            //     'error' => url('/payment-error'),
            // ],
        ];

        try {
            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            // TODO: (SANGAT PENTING!)
            // Simpan detail rental ke database Anda di sini dengan status 'pending'.
            // Order ID ($orderId) dari transaksi Midtrans harus disimpan di database
            // agar Anda bisa melacak statusnya nanti melalui webhook atau manual check.
            // Contoh:
            // \App\Models\RentalOrder::create([
            //     'order_id' => $orderId,
            //     'customer_name' => $request->nama,
            //     'customer_email' => $request->email,
            //     'car_type' => $request->tipe_mobil,
            //     'rental_date' => $request->tanggal_sewa,
            //     'rental_duration' => $request->durasi,
            //     'total_amount' => $request->total_harga,
            //     'payment_status' => 'pending', // Atau 'created'
            // ]);

            return response()->json(['snap_token' => $snapToken]);

        } catch (Exception $e) {
            // Log error lebih detail untuk debugging
            \Log::error('Midtrans payment initiation error: ' . $e->getMessage(), ['exception' => $e, 'request_data' => $request->all()]);
            // Kirim pesan error yang lebih informatif ke frontend
            return response()->json([
                'error' => 'Gagal memulai pembayaran: ' . $e->getMessage(),
                'status_code' => $e->getCode(), // Jika ada kode status HTTP dari Midtrans
                'response_body' => method_exists($e, 'getResponse') ? $e->getResponse() : null // Jika library Midtrans menangkap respons lengkap
            ], 500);
        }
    }

    // --- Opsional: Metode lain yang mungkin Anda miliki ---
    // public function store(Request $request) { /* ... */ }
    // public function showInvoice($id) { /* ... */ }
    // public function konfirmasiPembayaran($id) { /* ... */ }
    // public function cetakInvoice($id) { /* ... */ }
}