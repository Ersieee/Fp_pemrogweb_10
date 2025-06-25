<?php

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('home');
});

// Rental
Route::get('/rental', function () {
    return view('rental');
});

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
