<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class InvoiceController extends Controller
{
  public function show(Request $request)
{
    // Ambil data dari query string
    $data = [
        'nama' => $request->query('nama'),
        'email' => $request->query('email'),
        'tanggal' => $request->query('tanggal'),
        'hari' => $request->query('hari'),
        'mobil' => $request->query('mobil'),
        'harga' => $request->query('harga'),
        'total' => $request->query('total'),
    ];

    return view('invoice', $data);
}

}
