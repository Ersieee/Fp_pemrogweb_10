<?php

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\RentalController;

Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');


// Pelayanan
Route::get('/pelayanan', function () {
    return view('pelayanan');
});

// Tentang Kami
Route::get('/about', function () {
    return view('about');
});

// Kontak
Route::get('/contact', function () {
    return view('contact');
});

// Blog
Route::get('/blog', function () {
    return view('blog');
});

use App\Http\Controllers\InvoiceController;

Route::get('/invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.show');
