<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Pengguna</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="about-page">

  <!-- Navbar -->
  <nav>
    <ul>
    <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
<li><a href="{{ url('/rental') }}" class="{{ Request::is('rental') ? 'active' : '' }}"><i class="fas fa-car"></i> Rental</a></li>
<li><a href="{{ url('/pelayanan') }}" class="{{ Request::is('pelayanan') ? 'active' : '' }}"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
<li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}"><i class="fas fa-users"></i> Tentang Kami</a></li>
<li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Kontak</a></li>
<li><a href="{{ url('/blog') }}" class="{{ Request::is('blog') ? 'active' : '' }}"><i class="fas fa-blog"></i> Blog</a></li>
     <li><a href="/login" title="login"><i class="fas fa-user-circle navbar-login-icon"></i></a></li>
    </ul>
  </nav>

  <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded shadow-md w-96">
    @csrf
    <h2 class="text-xl font-semibold mb-4">Daftar Akun</h2>

    <input name="name" type="text" placeholder="Nama Lengkap" class="w-full p-2 mb-3 border rounded" required>
    <input name="email" type="email" placeholder="Email" class="w-full p-2 mb-3 border rounded" required>
    <input name="phone" type="text" placeholder="Nomor Telepon" class="w-full p-2 mb-3 border rounded" required>
    <input name="password" type="password" placeholder="Password" class="w-full p-2 mb-3 border rounded" required>
    <input name="password_confirmation" type="password" placeholder="Konfirmasi Password" class="w-full p-2 mb-4 border rounded" required>

    <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Daftar</button>
    <p class="mt-4 text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login</a></p>
  </form>
</body>
</html>
