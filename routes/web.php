<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
 
// Home
Route::view('/', 'home');

// Public pages
Route::view('/pelayanan', 'pelayanan');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/blog', 'blog');

// Rental
Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');

// ✅ Invoice (Static - tidak pakai ID, jika memang diperlukan)
Route::get('/invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.static'); // diperbaiki nama routenya

// Auth: Register & Login
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password (kalau ada fiturnya)
Route::get('/forgot-password', [LoginController::class, 'showForgotPasswordForm'])->middleware('guest');
Route::post('/forgot-password', [LoginController::class, 'handleForgotPassword'])->middleware('guest');

// Routes yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/user', [UserController::class, 'showUser'])->name('user.dashboard');

    // Simpan rental
    Route::post('/rental/store', [RentalController::class, 'store']);

    // ✅ Tampilkan invoice berdasarkan ID (dipakai untuk redirect setelah booking)
    Route::get('/invoice/{id}', [RentalController::class, 'showInvoice'])->name('invoice.show');

    // ✅ Konfirmasi pembayaran (POST)
    Route::post('/rental/konfirmasi/{id}', [RentalController::class, 'konfirmasiPembayaran'])->name('rental.konfirmasi');

    // ✅ Cetak invoice (GET)
    Route::get('/rental/invoice/{id}/cetak', [RentalController::class, 'cetakInvoice'])->name('rental.cetakInvoice');
});
 