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
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/rental') }}">Rental</a></li>
      <li><a href="{{ url('/pelayanan') }}">Pelayanan</a></li>
      <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
      <li><a href="{{ url('/contact') }}">Kontak</a></li>
      <li><a href="{{ url('/blog') }}">Blog</a></li>
      <li><a href="/admin" title="Admin"><i class="fas fa-user-circle navbar-admin-icon"></i></a></li>
    </ul>
  </nav>

  <!-- Form Registrasi -->
  <main class="container">
    <h2><i class="fas fa-user-plus"></i> Form Registrasi Pengguna</h2>

    <form method="POST" action="{{ route('register') }}" class="contact-form-section">
      @csrf

      <label for="name">Nama Lengkap</label>
      <input type="text" name="name" id="name" required placeholder="Nama lengkap">

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required placeholder="Email aktif">

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required placeholder="Password">

      <label for="password_confirmation">Konfirmasi Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Ulangi password">

      <button type="submit" class="upload-btn">Daftar</button>
    </form>
    <div class="text-center-box" style="margin-top: 2rem;">
      <p>Sudah punya akun? <a href="{{ route('login') }}" class="btn-layanan">Login Sekarang</a></p>
    </div>
  </main>

  <!-- Footer -->
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
          <img src="{{ asset('images/bri.png') }}" alt="BRI">
          <img src="{{ asset('images/shopeepay.png') }}" alt="ShopeePay">
          <img src="{{ asset('images/mandiri.png') }}" alt="Mandiri">
          <img src="{{ asset('images/visa.png') }}" alt="Visa">
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
