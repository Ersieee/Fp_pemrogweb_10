<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tentang Kami - PACE RENTAL</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/rental') }}">Rental</a></li>
      <li><a href="{{ url('/pelayanan') }}">Pelayanan</a></li>
      <li><a href="{{ url('/about') }}" class="active">Tentang Kami</a></li>
      <li><a href="{{ url('/contact') }}">Kontak</a></li>
      <li><a href="{{ url('/blog') }}">Blog</a></li>
    </ul>
  </nav>

  <div class="container fade-in">
    <div class="profile">
      <img src="{{ asset('images/logo1.png') }}" alt="Logo PACE RENTAL" class="logo">
      <div class="text-center-box">
        <h3>Selamat Datang Di PACE RENTAL</h3>
        <p>PACE RENTAL adalah pilihan tepat ...</p>
        <p>Di PACE RENTAL, kami percaya ...</p>
        <p class="quote">"Mengutamakan kenyamanan dan keselamatan ..."</p>
      </div>
    </div>

    <h2>Tentang Kami</h2>
    <div class="text-center-box">
      <p>Kami adalah penyedia layanan ...</p>
      <p>Kami percaya bahwa kenyamanan ...</p>
    </div>
  </div>

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
        <p>Jl. Kebon Agung dusun Nganti ...</p>
      </div>

      <div class="footer-column">
        <h3>Payment Partner</h3>
        <div class="payment-grid">
          <img src="{{ asset('images/bri.png') }}" alt="BRI Logo">
          <img src="{{ asset('images/bca.png') }}" alt="BCA Logo">
          <img src="{{ asset('images/mandiri.png') }}" alt="Mandiri Logo">
          <img src="{{ asset('images/visa.png') }}" alt="Visa Logo">
        </div>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const container = document.querySelector(".container");
      container.style.opacity = "1";
      container.style.transform = "translateY(0)";
      container.style.transition = "opacity 1s ease, transform 1s ease";
    });
  </script>
</body>
</html>
