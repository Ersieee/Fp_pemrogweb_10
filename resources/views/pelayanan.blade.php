<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pelayanan Kami - PACE RENTAL</title>
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

  {{-- Navbar --}}
  <nav class="bg-white shadow-md py-4">
    <div class="container mx-auto px-4">
      <ul class="flex space-x-4 justify-center">
        <li><a href="/" class="hover:text-blue-600">Home</a></li>
        <li><a href="/rental" class="hover:text-blue-600">Rental</a></li>
        <li><a href="/pelayanan" class="text-blue-600 font-semibold">Pelayanan</a></li>
        <li><a href="/about" class="hover:text-blue-600">Tentang Kami</a></li>
        <li><a href="/contact" class="hover:text-blue-600">Kontak</a></li>
        <li><a href="/blog" class="hover:text-blue-600">Blog</a></li>
      </ul>
    </div>
  </nav>

  {{-- Layanan --}}
  <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 grid md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold mb-2">City Car</h3>
        <p class="text-gray-700 mb-4">Penyediaan kendaraan hemat bahan bakar dan lincah.</p>
        <a href="#" class="text-blue-600 hover:underline">Selengkapnya</a>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold mb-2">Luxury Car</h3>
        <p class="text-gray-700 mb-4">Mobil mewah dengan fitur canggih.</p>
        <a href="#" class="text-blue-600 hover:underline">Selengkapnya</a>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold mb-2">Family Car</h3>
        <p class="text-gray-700 mb-4">Mobil keluarga yang luas dan nyaman.</p>
        <a href="#" class="text-blue-600 hover:underline">Selengkapnya</a>
      </div>
    </div>
  </section>

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

</body>
</html>
