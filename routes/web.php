<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
=======
>>>>>>> db8830872e6894ed08ddb68e7e9de89c7123282d
use App\Http\Controllers\UserController;

// Home
Route::get('/', function () {
    return view('home');
});

<<<<<<< HEAD
// Rental
=======
// Public pages
>>>>>>> db8830872e6894ed08ddb68e7e9de89c7123282d
Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');
Route::view('/pelayanan', 'pelayanan');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/blog', 'blog');

<<<<<<< HEAD
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
=======
// Invoice
Route::get('/invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.show');

// Auth - Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Auth - Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard (setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'showUser'])->name('user.dashboard');
});

// TIDAK PERLU BANYAK-BANYAK
Route::get('/debug-auth', function () {
    return Auth::user() ?? 'Belum login';
});
>>>>>>> db8830872e6894ed08ddb68e7e9de89c7123282d
