<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class InvoiceController extends Controller
{
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
