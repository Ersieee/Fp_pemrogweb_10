<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tentang Kami - PACE RENTAL</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

 <body class="blog-page">
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
   <div class="" style="text-align: center; margin-bottom: 40px;">
    <div class="profile">
      <img src="{{ asset('images/logo1.png') }}" alt="Logo PACE RENTAL" class="logo">
      <div class="text-center-box">
        <h3>Selamat Datang Di PACE RENTAL</h3>
        <p>PACE RENTAL adalah pilihan tepat untuk Anda yang mencari layanan rental mobil berkualitas dengan harga terjangkau. Berdiri sejak tahun 2010, kami telah melayani ribuan pelanggan dengan dedikasi tinggi, memberikan pengalaman perjalanan yang nyaman dan aman...</p>
        <p>Di PACE RENTAL, kami percaya bahwa mobil bukan hanya alat transportasi, tetapi juga teman perjalanan yang membantu mewujudkan impian Anda. Dari perjalanan bisnis hingga liburan keluarga, kami memiliki berbagai pilihan mobil yang siap menemani Anda ke berbagai tujuan...</p>
        <p class="quote">"Mengutamakan kenyamanan dan keselamatan, menjadikan perjalanan Anda lebih berarti."</p>
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
    const container = document.querySelector(".container-small");
if(container){
  container.style.opacity = "1";
  container.style.transform = "translateY(0)";
  container.style.transition = "opacity 1s ease, transform 1s ease";
}

  </script>
</body>
</html>
