<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Pengguna</title>
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
      <li><a href="/login" title="login"><i class="fas fa-user-circle navbar-login-icon"></i></a></li>
    </ul>
  </nav>

  <!-- Login Form -->
  <main class="container">
    <h2><i class="fas fa-sign-in-alt"></i> Login Pengguna</h2>

    <form method="POST" action="{{ route('login') }}" class="contact-form-section">
      @csrf

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required placeholder="Masukkan email">

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required placeholder="Masukkan password">

      <button type="submit" class="upload-btn">Login</button>
    </form>

    <div class="text-center-box" style="margin-top: 1rem;">
      <p>Belum punya akun? <a href="{{ route('register') }}" class="btn-layanan">Daftar Sekarang</a></p>
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
        <p>Jl. Kedon Agung dusun Nganti, Sendangadi, Kec. Mlati, Kabupaten Sleman,<br>DIY 55284</p>
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
