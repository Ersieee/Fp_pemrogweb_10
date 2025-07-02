<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PACE RENTAL</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="{{ url('/rental') }}" class="{{ Request::is('rental') ? 'active' : '' }}"><i class="fas fa-car"></i> Rental</a></li>
        <li><a href="{{ url('/pelayanan') }}" class="{{ Request::is('pelayanan') ? 'active' : '' }}"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
        <li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}"><i class="fas fa-users"></i> Tentang Kami</a></li>
        <li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Kontak</a></li>
        <li><a href="{{ url('/blog') }}" class="{{ Request::is('blog') ? 'active' : '' }}"><i class="fas fa-blog"></i> Blog</a></li>
        <li><a href="{{ route('user.dashboard') }}" class="{{ Request::is('user') ? 'active' : '' }}"><i class="fas fa-user"></i></a></li>
    </ul>
</nav>

<main class="container">
    <h2><i class="fas fa-sign-in-alt"></i> Form Login Pengguna</h2>

    {{-- BARU: Menampilkan pesan error sesi (misal: "Email atau password salah.") --}}
    @if(session('error'))
        <div style="color: red; margin-bottom: 15px; text-align: center;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="contact-form-section">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="Email aktif" value="{{ old('email') }}">
        {{-- BARU: Menampilkan error validasi untuk field email --}}
        @error('email')
            <div style="color: red; font-size: 0.9em; margin-top: -8px; margin-bottom: 10px;">{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required placeholder="Masukkan password">
        {{-- BARU: Menampilkan error validasi untuk field password --}}
        @error('password')
            <div style="color: red; font-size: 0.9em; margin-top: -8px; margin-bottom: 10px;">{{ $message }}</div>
        @enderror

        <button type="submit" class="upload-btn">Login</button>
    </form>

    {{-- PERUBAHAN DI SINI: Menambahkan class "auth-footer-text" --}}
    <div class="auth-footer-text">
        <p>Belum punya akun? <a href="{{ route('register') }}" class="btn-layanan">Daftar Sekarang</a></p>
    </div>
</main>
</body>
</html>