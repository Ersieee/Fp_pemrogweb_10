<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

// Home
Route::get('/', function () {
    return view('home');
});

// Rental
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

// Invoice
Route::get('/invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.show');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

 // Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [LoginController::class, 'showForgotPasswordForm'])->middleware('guest');
Route::post('/forgot-password', [LoginController::class, 'handleForgotPassword'])->middleware('guest');

// User Profile / Dashboard
Route::get('/user', [UserController::class, 'showUser'])->middleware('auth');

// Profile halaman
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

//Rental
Route::post('/rental', [RentalController::class, 'store'])->middleware('auth');
