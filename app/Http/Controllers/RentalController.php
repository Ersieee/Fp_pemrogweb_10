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
    public function index() // Ini adalah metode 'index' yang harus Anda tambahkan
    {
        // Seperti yang kita bahas sebelumnya, di sini Anda hanya perlu mengembalikan view
        // yang berisi daftar mobil dan form penyewaan.
        // Asumsi nama file Blade Anda adalah 'rental.blade.php' di folder 'resources/views'.
        return view('rental');
    }

    /**
     * Menyimpan data penyewaan mobil baru ke database.
     * Metode ini dipanggil ketika form penyewaan disubmit.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Rental::create([
            'user_id' => auth()->id(),
            'tanggal_sewa' => $request->tanggal_sewa,
            
            'durasi' => $request->durasi,
            'total_harga' => $request->total_harga,
            'tipe_mobil' => $request->tipe_mobil,
            // Perhatikan: 'batas_pemakaian' ada di kode Anda, pastikan ini ada di tabel rentals Anda
            'batas_pemakaian' => $request->batas_pemakaian
        ]);

        return redirect()->back()->with('success', 'Rental berhasil disimpan!');
    }
    public function showInvoice($id)
{
    $rental = Rental::findOrFail($id);
    return view('invoice', compact('rental'));
}

}
