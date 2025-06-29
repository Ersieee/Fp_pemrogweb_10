<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login User</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<body class="blog-page">
  <!-- Navbar -->
 <nav>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/rental') }}">Rental</a></li>
      <li><a href="{{ url('/pelayanan') }}">Pelayanan</a></li>
      <li><a href="{{ url('/about') }}" >Tentang Kami</a></li>
      <li><a href="{{ url('/contact') }}">Kontak</a></li>
      <li><a href="{{ url('/blog') }}" >Blog</a></li>
      <li><a href="{{ url('/admin') }}" class="active">Admin</a></li>
    </ul>
  </nav>

  {{-- Form Login --}}
  <main>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>

  {{-- Navbar --}}
  <nav class="bg-white shadow-md py-4">
    <div class="container mx-auto px-4">
      <ul class="flex space-x-4 justify-center">
        <li><a href="/" class="hover:text-blue-600">Home</a></li>
        <li><a href="/rental" class="hover:text-blue-600">Rental</a></li>
        <li><a href="/pelayanan" class="hover:text-blue-600">Pelayanan</a></li>
        <li><a href="/about" class="hover:text-blue-600">Tentang Kami</a></li>
        <li><a href="/contact" class="hover:text-blue-600">Kontak</a></li>
        <li><a href="/blog" class="hover:text-blue-600">Blog</a></li>
        <li><a href="/admin" title="Admin"><i class="fas fa-user-circle navbar-admin-icon"></i></a></li>
      </ul>
    </div>
  </nav>

  {{-- Form Login --}}
  <main class="admin-container">

    <div class="admin-header">
      <h2><i class="fas fa-sign-in-alt"></i> Login Pengguna</h2>
    </div>

    <div class="login-form-container">
      <form action="/login" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required placeholder="Masukkan email"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required placeholder="Masukkan password"><br><br>

        <button type="submit" class="login-btn">Login</button>
      </form>
    </div>
  </main>

  {{-- Register Link --}}
  <div class="register-link">
    <p>Belum punya akun? <a href="/register" class="text-blue-600 hover:underline">Daftar Sekarang</a></p>
  </div>

  <!-- Footer -->
=======
  {{-- Admin Footer --}}
  <footer class="admin-footer">
    <p>&copy; 2023 PACE RENTAL. All rights reserved.</p>
  </footer>
  {{-- Footer --}}

  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h3>Jam Layanan</h3>
        <ul>
          <li><strong>Telephone Sales</strong><br>Senin–Jumat, 08:00–17:00</li>
          <li><strong>Customer Service</strong><br>Senin–Sabtu, 09:00–20:00</li>
        </ul>
      </div>


       <div class="footer-column">
        <h3>Media Sosial</h3>
        <ul>
          <li><i class="fab fa-instagram"></i> <a href="#">@anugerah.x</a></li>
          <li><i class="fab fa-whatsapp"></i> <a href="#">+62 853-9911-1636</a></li>
          <li><i class="fab fa-facebook"></i> <a href="#">Pace_Rental</a></li>
          <li><i class="fab fa-tiktok"></i> <a href="#">Anugerah.x</a></li>
        </ul>
      </div>

<div class="footer-column">
        <h3>Alamat</h3>
        <p>Jl. Kedon Agung dusun Nganti, Sendangadi, Kec. Mlati, Kabupaten Sleman, <br>Daerah Istimewa Yogyakarta 55284</p>
      </div>
      <div class="footer-column">
        <h3>Payment Partner</h3>
        <div class="payment-grid">
          <img src="images/bri.png" alt="BRI">
          <img src="images/shopeepay.png" alt="BCA">
          <img src="images/mandiri.png" alt="Mandiri">
          <img src="images/visa.png" alt="Visa">
        </div>

      <div class="footer-column">
        <h3>Media Sosial</h3>
        <ul>
          <li><i class="fab fa-instagram"></i> @anugerah.x</li>
          <li><i class="fab fa-whatsapp"></i> +62 853-9911-1636</li>
          <li><i class="fab fa-facebook"></i> Pace_Rental</li>
          <li><i class="fab fa-tiktok"></i> Anugerah.x</li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Alamat</h3>
        <p>Jl. Kebon Agung, Nganti, Sendangadi, Mlati, Sleman, Yogyakarta 55284</p>

      </div>
    </div>
  </footer>

</body>

</html>

</html>

