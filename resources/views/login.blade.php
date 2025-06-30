<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - PACE RENTAL</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<nav>
    <ul>
   <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
<li><a href="{{ url('/rental') }}" class="{{ Request::is('rental') ? 'active' : '' }}"><i class="fas fa-car"></i> Rental</a></li>
<li><a href="{{ url('/pelayanan') }}" class="{{ Request::is('pelayanan') ? 'active' : '' }}"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
<li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}"><i class="fas fa-users"></i> Tentang Kami</a></li>
<li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Kontak</a></li>
<li><a href="{{ url('/blog') }}" class="{{ Request::is('blog') ? 'active' : '' }}"><i class="fas fa-blog"></i> Blog</a></li>
   <li><a href="{{ route('user.dashboard') }}" class="{{ Request::is('user') ? 'active' : '' }}"><i class="fas fa-user"></i> Dashboard</a></li>
    </ul>
  </nav>

 <!-- Form Login -->
<main class="container">
  <h2><i class="fas fa-sign-in-alt"></i> Form Login Pengguna</h2>

  <form method="POST" action="{{ route('login') }}" class="contact-form-section">
    @csrf

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required placeholder="Email aktif">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required placeholder="Masukkan password">

    <button type="submit" class="upload-btn">Login</button>
  </form>

  <div class="text-center-box" style="margin-top: 2rem;">
    <p>Belum punya akun? <a href="{{ route('register') }}" class="btn-layanan">Daftar Sekarang</a></p>
  </div>
</main>
</body>
</html>