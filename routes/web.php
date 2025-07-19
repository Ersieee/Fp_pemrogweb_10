<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/ 

// ✅ Rute Halaman Utama
Route::view('/', 'home')->name('home');

// ✅ Rute Halaman Publik
Route::view('/pelayanan', 'pelayanan')->name('pelayanan');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blog', 'blog')->name('blog');

// ✅ Rute Rental (Halaman daftar mobil)
Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');

// ✅ Inisiasi Snap Midtrans (Penting: Ini harus di luar middleware 'auth'
//    agar pengguna bisa menyewa/membayar tanpa login terlebih dahulu)
Route::post('/rental/initiate-payment', [RentalController::class, 'initiatePayment'])->name('rental.initiatePayment');

// ✅ Callback dari Midtrans (webhook, tanpa auth!)
Route::post('/midtrans/callback', [PaymentController::class, 'handleCallback'])->name('midtrans.callback');

// ✅ Order status: Redirect setelah transaksi
//    Pilih salah satu, dan gunakan controller/logic yang sesuai.
//    Saya sarankan menggunakan PaymentController::class, 'showOrderStatus'
//    karena lebih terstruktur. Ini juga harus di luar 'auth' agar semua orang bisa melihat statusnya.
Route::get('/order-status/{orderId}', [PaymentController::class, 'showOrderStatus'])->name('order.status');


// ✅ Autentikasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ✅ Lupa Password
Route::get('/forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [LoginController::class, 'handleForgotPassword'])->name('password.email')->middleware('guest');

 
// ✅ Grup route yang hanya untuk pengguna login
Route::middleware(['auth'])->group(function () {
    // Dashboard pengguna
    Route::get('/user', [UserController::class, 'showUser'])->name('user.dashboard');

    // Simpan data rental (awal) - Jika ini adalah proses penyimpanan data sebelum inisiasi pembayaran,
    // maka ini bisa tetap di dalam 'auth' jika Anda hanya ingin pengguna login yang bisa menyimpan
    // draft rental. Namun, jika ini menyimpan data final setelah pembayaran, mungkin perlu disesuaikan
    // tergantung alur Anda. Untuk sekarang, biarkan di sini.
    Route::post('/rental/store', [RentalController::class, 'store'])->name('rental.store');
 

    // Lihat invoice by ID (untuk pengguna yang sudah login)
    Route::get('/invoice/{id}', [RentalController::class, 'showInvoice'])->name('invoice.show');

    // Konfirmasi manual (jika masih dipakai)
    Route::post('/rental/konfirmasi/{id}', [RentalController::class, 'konfirmasiPembayaran'])->name('rental.konfirmasi');

    // ✅ Cetak Invoice PDF
    Route::get('/rental/invoice/{id}/cetak', [RentalController::class, 'cetakInvoice'])->name('rental.cetakInvoice');

    // [Opsional] Checkout manual (jika tidak pakai Snap sepenuhnya)
    Route::get('/checkout', [PaymentController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
});

// ✅ Rute profil pengguna (opsional)
// Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
// Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); 