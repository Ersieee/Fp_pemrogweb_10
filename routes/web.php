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



// routes/web.php
 use App\Http\Controllers\Auth\RegisterController;
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Reset password (manual)
Route::get('/forgot-password', [LoginController::class, 'showForgotPasswordForm'])->middleware('guest');
Route::post('/forgot-password', [LoginController::class, 'handleForgotPassword'])->middleware('guest');

<<<<<<< HEAD
Route::get('/home', function () {
    return view('/home');
})->middleware('auth');

use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');




=======

use App\Http\Controllers\UserController;

Route::get('/user', [UserController::class, 'showUser'])->middleware('auth');
>>>>>>> 31c4b2df108a2a49084cec3f10752ee23662ea1e
