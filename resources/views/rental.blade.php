<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Rental Mobil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

    footer {
      background: linear-gradient(to bottom, #0d3b66, #dbe9f4);
      color: white;
      padding: 40px 20px;
      font-family: sans-serif;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .footer-column h3 {
      font-size: 1.25rem;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .footer-column ul,
    .footer-column p {
      font-size: 1rem;
      line-height: 1.6;
      color: #f0f0f0;
    }

    .footer-column a {
      color: #f0f0f0;
      text-decoration: none;
    }

    .payment-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
    }

    .payment-grid img {
      max-width: 100%;
      height: auto;
      object-fit: contain;
    }
  </style>
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
   <li><a href="{{ route('user.dashboard') }}" class="{{ Request::is('user') ? 'active' : '' }}"><i class="fas fa-user"></i></a></li>
    </ul>
  </nav>

  <main class="blog-container">
    <div class="max-w-6xl mx-auto py-10 px-4">
      <h2 class="text-3xl font-bold text-center mb-8">Daftar Mobil Tersedia</h2>

      @php
        $categories = [
          'Family Car' => [
            ['img' => 'family/fortuner.jpg', 'nama' => 'Fortuner', 'harga' => 800000, 'desc' => 'Gagah, nyaman, dan bertenaga.'],
            ['img' => 'family/avanza.jpg', 'nama' => 'Avanza', 'harga' => 350000, 'desc' => 'Irit, nyaman, cocok buat harian.'],
            ['img' => 'family/innova.png', 'nama' => 'Innova', 'harga' => 500000, 'desc' => 'Luas, nyaman buat keluarga besar.'],
          ],
          'City Car' => [
            ['img' => 'city/ayla.jpg', 'nama' => 'Ayla', 'harga' => 300000, 'desc' => 'Hemat bahan bakar, lincah di kota.'],
            ['img' => 'city/etios.png', 'nama' => 'Etios', 'harga' => 400000, 'desc' => 'Stylish dan responsif.'],
            ['img' => 'city/brio.png', 'nama' => 'Brio', 'harga' => 250000, 'desc' => 'Praktis & lega buat anak muda.'],
          ],
          'Premium Car' => [
            ['img' => 'premium/hiace.png', 'nama' => 'Hiace Commuter', 'harga' => 1700000, 'desc' => 'Muatan banyak, nyaman jarak jauh.'],
            ['img' => 'premium/vellfire.jpg', 'nama' => 'Vellfire', 'harga' => 2100000, 'desc' => 'Mewah, stylish dan responsif.'],
            ['img' => 'premium/alphard.png', 'nama' => 'Alphard', 'harga' => 2700000, 'desc' => 'Premium & lega buat keluarga.'],
          ],
        ];
      @endphp

      @foreach ($categories as $kategori => $mobils)
        <h3 class="text-2xl font-semibold mb-4 mt-10">{{ $kategori }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
          @foreach ($mobils as $mobil)
            <div class="bg-white rounded-lg shadow p-4 text-center">
              <img src="{{ asset('images/' . $mobil['img']) }}" alt="{{ $mobil['nama'] }}" class="w-full h-48 object-cover rounded">
              <h2 class="text-xl font-bold mt-4">{{ $mobil['nama'] }}</h2>
              <h4 class="text-blue-600 text-lg">Rp {{ number_format($mobil['harga'], 0, ',', '.') }} / hari</h4>
              <p class="text-gray-600 mt-2">{{ $mobil['desc'] }}</p>
              <button onclick="openModal('{{ $mobil['nama'] }}', {{ $mobil['harga'] }})"
                class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Sewa Sekarang</button>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>

    <!-- Modal -->
    <div id="sewaModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center overflow-auto">
      <div class="bg-white p-6 rounded-lg max-w-md w-full relative overflow-y-auto max-h-screen">
        <button class="absolute top-2 right-4 text-2xl font-bold text-gray-500 hover:text-black" onclick="closeModal()">&times;</button>
        <h2 class="text-2xl font-bold mb-4">Form Penyewaan Mobil</h2>
        <form action="{{ url('/rental/store') }}" method="POST">
  @csrf
  <label>Nama</label>
  <input type="text" name="nama" id="nama" required class="w-full border p-2 rounded mb-3">
  <label>Email</label>
  <input type="email" name="email" id="email" required class="w-full border p-2 rounded mb-3">
  <label>Tanggal Sewa</label>
  <input type="date" name="tanggal_sewa" id="tanggal" required class="w-full border p-2 rounded mb-3">
  <label>Jumlah Hari</label>
  <input type="number" name="durasi" id="hari" min="1" required class="w-full border p-2 rounded mb-3">
  <label>Mobil</label>
  <input type="text" name="tipe_mobil" id="mobil" readonly class="w-full border p-2 rounded mb-3 bg-gray-100">
  <label>Harga per Hari (Rp)</label>
  <input type="number" name="harga" id="harga" readonly class="w-full border p-2 rounded mb-3 bg-gray-100">
  <label>Total Harga (Rp)</label>
  <input type="number" name="total_harga" id="total" readonly class="w-full border p-2 rounded mb-4 bg-gray-100">
  <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Kirim</button>
</form>

      </div>
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
        <p>Jl. Kedon Agung dusun Nganti, Sendangadi, Kec. Mlati, Kabupaten Sleman,<br>Daerah Istimewa Yogyakarta 55284</p>
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

  <script>
    function openModal(mobil, harga) {
      document.getElementById('mobil').value = mobil;
      document.getElementById('harga').value = harga;
      document.getElementById('hari').value = '';
      document.getElementById('total').value = '';
      document.getElementById('sewaModal').classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
      document.getElementById('sewaModal').classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    }

    document.getElementById('hari').addEventListener('input', () => {
      const harga = parseInt(document.getElementById('harga').value);
      const hari = parseInt(document.getElementById('hari').value);
      document.getElementById('total').value = (harga * hari) || '';
    });
  </script>

</body>
</html>
