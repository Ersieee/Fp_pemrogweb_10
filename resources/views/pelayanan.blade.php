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
   <li><a href="{{ route('user.dashboard') }}" class="{{ Request::is('user') ? 'active' : '' }}"><i class="fas fa-user"></i> Dashboard</a></li>
    </ul>
  </nav>
  <main class="container">

  <!-- Section Layanan -->
   <section class="layanan-lanjutan">
  <div class="layanan-item">
      <h3>City Car</h3>
      <p>
        Penyediaan yang layak untuk kendaraan di tengah kota. Hemat bahan bakar dan lincah untuk berkendara di tengah kota. Cocok untuk bersama keluarga.
      </p>
      <a href="#" class="btn-layanan">Selengkapnya</a>
    </div>
  <div class="layanan-item">
      <h3>Luxury Car</h3>
      <p>
        Penyewaan mobil mewah yang menawarkan kenyamanan dan kemewahan dengan fitur-fitur canggih. Cocok untuk acara spesial, pernikahan, atau perjalanan bisnis.
      </p>
      <a href="#" class="btn-layanan">Selengkapnya</a>
   </div>
  <div class="layanan-item">
      <h3>Family Car</h3>
      <p>
        Penyewaan mobil keluarga yang luas dan nyaman. Nikmati perjalanan nyaman bersama keluarga dengan mobil berkapasitas luas dan fitur keselamatan lengkap. Cocok untuk liburan, mudik, atau acara keluarga.
      </p>
      <a href="#" class="btn-layanan">Selengkapnya</a>
    </div>
  </section>

  <!-- Section Additional Services -->
  <section class="additional-services">
    <div class="service">
      <div class="icon-circle">🚗</div>
      <h3>VEHICLES</h3>
      <p>Semua kendaraan Pace Rental secara rutin dipelihara untuk memastikan kenyamanan dan keamanan Anda selama setiap perjalanan.</p>
    </div>
    <div class="service">
      <div class="icon-circle">🗺️</div>
      <h3>NETWORK AREA</h3>
      <p>Pace Rental memiliki jaringan yang luas di berbagai kota untuk memenuhi kebutuhan pelanggan dengan efektif.</p>
    </div>
    <div class="service">
      <div class="icon-circle">📦</div>
      <h3>TRANSPORTATION SERVICES</h3>
      <p>Pace Rental menawarkan berbagai layanan, termasuk Penyewaan Mobil, seperti kendaraan di kota, kendaraan untuk keluarga dan juga kendaraan untuk berbisnis.</p>
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

