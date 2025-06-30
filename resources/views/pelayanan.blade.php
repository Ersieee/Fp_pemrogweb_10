<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pelayanan Kami - PACE RENTAL</title>
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
 <body class="blog-page">
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
   <main class="blog-container">

 <!-- Layanan -->
<section class="py-12 bg-gray-50">
  <div class="container mx-auto px-4 grid md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-xl font-bold mb-2">City Car</h3>
      <p class="text-gray-700 mb-4">Penyediaan kendaraan hemat bahan bakar dan lincah.</p>
      <a href="/rental" class="text-blue-600 hover:underline">Selengkapnya</a>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-xl font-bold mb-2">Luxury Car</h3>
      <p class="text-gray-700 mb-4">Mobil mewah dengan fitur canggih.</p>
      <a href="/rental" class="text-blue-600 hover:underline">Selengkapnya</a>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-xl font-bold mb-2">Family Car</h3>
      <p class="text-gray-700 mb-4">Mobil keluarga yang luas dan nyaman.</p>
      <a href="/rental" class="text-blue-600 hover:underline">Selengkapnya</a>
    </div>
  </div>
</section>
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
          <img src="images/bri.png" alt="BRI">
          <img src="images/shopeepay.png" alt="BCA">
          <img src="images/mandiri.png" alt="Mandiri">
          <img src="images/visa.png" alt="Visa">
        </div>
      </div>
    </div>
  </footer>
</body>
</html>

