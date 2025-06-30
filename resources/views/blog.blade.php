<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blog | Rental Mobil Jogja</title>
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

  <!-- Konten Blog -->
  <main class="blog-container">
    <h1>Rekomendasi Kuliner & Hotel di Yogyakarta</h1>

     <!-- Kuliner -->
    <section class="blog-section">
      <h2>Kuliner Terenak</h2>
      <div class="blog-grid">
        <article class="blog-card">
          <img src="images/makanan/gudeg yu djum.png" alt="Gudeg Yu Djum">
          <h3>Gudeg Yu Djum</h3>
          <p>Ikon kuliner Jogja yang legendaris! Gudeg manis khas Jogja yang disajikan dengan krecek, telur, dan ayam kampung ini punya cita rasa autentik. Lokasinya strategis dan wajib dikunjungi oleh pencinta makanan tradisional.</p>
          <a href="https://maps.app.goo.gl/yKqb2tCXMTZu9HNM8" target="_blank">📍 Cek Lokasi</a>
        </article>
        <article class="blog-card">
          <img src="images/makanan/Sate Klathak Pak Pong.png" alt="Sate Klathak Pak Pong">
          <h3>Sate Klathak Pak Pong</h3>
          <p>Sate kambing unik yang hanya dibumbui garam dan merica, lalu dibakar dengan tusukan besi. Rasanya gurih, lembut, dan sangat khas! Tempatnya selalu ramai, jadi siap-siap antre demi kelezatannya.</p>
          <a href="https://maps.app.goo.gl/BDjHmUVktFHsRrWu5" target="_blank">📍 Cek Lokasi</a>
        </article>
        <article class="blog-card">
          <img src="images/makanan/Bakmi Jawa Mbah Gito.png" alt="Bakmi Jawa Mbah Gito">
          <h3>Bakmi Jawa Mbah Gito</h3>
          <p>Makan malam dengan suasana ndeso? Di sinilah tempatnya. Bakmi Jawa Mbah Gito terkenal dengan mie rebus dan gorengnya yang dimasak dengan anglo. Tempatnya penuh ornamen kayu dan suasana tradisional yang bikin betah.</p>
          <a href="https://maps.app.goo.gl/Wm5ndDbDywKDJN6J9" target="_blank">📍 Cek Lokasi</a>
        </article>
      </div>
    </section>

     <!-- Hotel -->
    <section class="blog-section">
      <h2>Hotel Terbaik</h2>
      <div class="blog-grid">
        <article class="blog-card">
          <img src="images/makanan/Hotel Tentrem.png" alt="Hotel Tentrem">
          <h3>Hotel Tentrem</h3>
          <p>Hotel bintang lima yang mengusung kemewahan khas budaya Jawa. Terletak di pusat kota, Tentrem menawarkan kenyamanan kelas atas dengan desain elegan, spa eksklusif, dan kolam renang yang tenang. Cocok untuk liburan mewah atau perjalanan bisnis yang berkelas.</p>
          <a href="https://maps.app.goo.gl/RvP7EvswCqrMSemd8" target="_blank">📍 Cek Lokasi</a>
        </article>
        <article class="blog-card">
          <img src="images/makanan/Royal ambrrukmo.png" alt="Royal Ambarrukmo">
          <h3>Royal Ambarrukmo</h3>
          <p>Hotel bersejarah yang dulunya adalah istana kerajaan, kini menjadi hotel mewah dengan nuansa tradisional yang kental. Kamu bisa menikmati kemegahan arsitektur Jawa, lengkap dengan taman klasik dan pengalaman kuliner khas kerajaan.</p>
          <a href="https://maps.app.goo.gl/e2yvJb7qCjAduo8U7" target="_blank">📍 Cek Lokasi</a>
        </article>
        <article class="blog-card">
          <img src="images/makanan/Greenhost Boutique Hotel.png" alt="Greenhost Boutique Hotel">
          <h3>Greenhost Boutique Hotel</h3>
          <p>Hotel eco-friendly dengan desain artistik dan konsep ramah lingkungan. Cocok untuk traveler muda yang peduli lingkungan dan suka tempat "Instagramable". Greenhost punya urban farm di atap dan suasana yang tenang di tengah hiruk-pikuk kota.</p>
          <a href="https://maps.app.goo.gl/mmYtDarCzuNigi5E7" target="_blank">📍 Cek Lokasi</a>
        </article>
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
