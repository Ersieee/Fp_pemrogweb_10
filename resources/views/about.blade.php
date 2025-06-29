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
 <nav class="bg-blue-900 p-4 text-white">
    <ul class="flex justify-center gap-6">
      <li><a href="{{ url('/') }}" class="hover:text-blue-300">Home</a></li>
      <li><a href="{{ url('/rental') }}" class="text-blue-300 font-bold">Rental</a></li>
      <li><a href="{{ url('/pelayanan') }}" class="hover:text-blue-300">Pelayanan</a></li>
      <li><a href="{{ url('/about') }}" class="hover:text-blue-300">Tentang Kami</a></li>
      <li><a href="{{ url('/contact') }}" class="hover:text-blue-300">Kontak</a></li>
      <li><a href="{{ url('/blog') }}" class="hover:text-blue-300">Blog</a></li>
    <li><a href="/admin" title="Admin"><i class="fas fa-user-circle navbar-admin-icon"></i></a></li>
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
