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
Route::get('/', function () {
    return view('home');
});

// Public pages
Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');
Route::view('/pelayanan', 'pelayanan');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/blog', 'blog');

// Invoice
Route::get('/invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.show');

// Auth - Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Auth - Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'showUser'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Debug login status
Route::get('/debug-auth', function () {
    return Auth::user() ?? 'Belum login';
});
