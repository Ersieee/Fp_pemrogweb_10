<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kontak - Rental Mobil</title>

   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>
 <nav class="bg-blue-900 p-4 text-white">
    <ul class="flex justify-center gap-6">
    <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
<li><a href="{{ url('/rental') }}" class="{{ Request::is('rental') ? 'active' : '' }}"><i class="fas fa-car"></i> Rental</a></li>
<li><a href="{{ url('/pelayanan') }}" class="{{ Request::is('pelayanan') ? 'active' : '' }}"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
<li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}"><i class="fas fa-users"></i> Tentang Kami</a></li>
<li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Kontak</a></li>
<li><a href="{{ url('/blog') }}" class="{{ Request::is('blog') ? 'active' : '' }}"><i class="fas fa-blog"></i> Blog</a></li>
   <li><a href="{{ route('user.dashboard') }}" class="{{ Request::is('user') ? 'active' : '' }}"><i class="fas fa-user"></i> Dashboard</a></li>
     </ul>
  </nav>
   <main>
    <section class="map-section">
      <h2>Lokasi Kami</h2>
      <div class="map-container" style="text-align: center; margin-bottom: 40px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.08834198359!2d110.3589753260133!3d-7.745892457321873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a590030ae93c5%3A0xbaaeab702ec70cd!2sKost%20alfarizi!5e0!3m2!1sen!2sid!4v1746963396231!5m2!1sen!2sid"
          width="90%" height="450" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
     <section class="contact-form-section" style="display: flex; flex-wrap: wrap; justify-content: space-between; padding: 0 5%;">
      <div style="flex: 1 1 60%; min-width: 300px;">
        <h2>Send us mail</h2>
        <form>
          <label>Name *</label>
          <input type="text" required />
          <label>E-Mail *</label>
          <input type="email" required />
          <label>Subject *</label>
          <input type="text" required />
          <label>Message *</label>
          <textarea required></textarea>
          <label>Please prove that you are human by solving the equation *</label>
          <input type="text" placeholder="1 + 1 = ?" required />
          <button type="submit">Submit</button>
        </form>
      </div>
       <div style="flex: 1 1 35%; min-width: 250px; margin-top: 30px;">
        <h3>📞 Phone</h3>
        <p><strong>Telp:</strong> (0274) 4340640</p>
        <p><strong>Tsel / WA:</strong> 081227722211</p>
        <p><strong>Tsel / WA:</strong> 0852 9299 9937</p>
         <p><strong>XL:</strong> 081903785511</p>
        <h3>🕒 Office 24 Hours</h3>
        <p>Monday to Sunday</p>
         <h3>📍 Visit</h3>
        <p><strong>Head Office:</strong> Jl. Gambir Anom No. 26 Pandeyan, Umbulharjo, Kota Yogyakarta 55161</p>
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
   <!-- Footer dinamis -->
  <div id="footer-placeholder"></div>
  <script src="script.js"></script>
 </body>
</html>
