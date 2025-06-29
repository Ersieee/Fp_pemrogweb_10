<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showInvoice(Request $request)
    {
        $mobil = $request->mobil;
        $harga = $request->harga;
        $total = $request->total;

        // Nomor invoice random
        $invoice = 'INV' . rand(10000000, 99999999);

        // Batas waktu pembayaran (24 jam dari sekarang)
        $batasWaktu = now()->addDay()->format('d F Y, H:i') . ' WIB';

        return view('invoice', compact('mobil', 'harga', 'total', 'invoice', 'batasWaktu'));
    }
}
