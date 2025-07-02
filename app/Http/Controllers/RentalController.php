<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental; // Pastikan model Rental Anda sudah ada dan benar

class RentalController extends Controller
{
    /**
     * Menampilkan halaman daftar mobil untuk penyewaan.
     * Metode ini dipanggil ketika URL /rental diakses.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
         return view('rental');
    }

    /**
     * Menyimpan data penyewaan mobil baru ke database dan redirect ke invoice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rental = Rental::create([
            'user_id' => auth()->id(),
             'tanggal_sewa' => $request->tanggal_sewa,
            'durasi' => $request->durasi,
            'total_harga' => $request->total_harga,
            'tipe_mobil' => $request->tipe_mobil,
            'batas_pemakaian' => $request->batas_pemakaian
        ]);

        // 🧾 Arahkan langsung ke halaman invoice setelah berhasil simpan
        return redirect()->route('invoice.show', $rental->id);
    }

    /**
     * Menampilkan invoice berdasarkan ID rental.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function showInvoice($id)
    {
        $rental = Rental::findOrFail($id);
        return view('invoice', compact('rental'));
    }

    /**
     * Mengubah status pembayaran menjadi PAID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function konfirmasiPembayaran($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->status_transaksi = 'PAID';
        $rental->status_pembayaran = 'PAID';
        $rental->save();

        return redirect()->back()->with('success', 'Pembayaran telah dikonfirmasi.');
    }

    /**
     * Menampilkan tampilan cetak invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function cetakInvoice($id)
    {
        $rental = Rental::findOrFail($id);
        return view('rental.invoice_pdf', compact('rental'));
    }
}
