<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Mobil</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-blue-900 p-4 text-white">
    <ul class="flex justify-center gap-6">
      <li><a href="{{ url('/') }}" class="hover:text-blue-300">Home</a></li>
      <li><a href="{{ url('/rental') }}" class="text-blue-300 font-bold">Rental</a></li>
      <li><a href="{{ url('/pelayanan') }}" class="hover:text-blue-300">Pelayanan</a></li>
      <li><a href="{{ url('/about') }}" class="hover:text-blue-300">Tentang Kami</a></li>
      <li><a href="{{ url('/contact') }}" class="hover:text-blue-300">Kontak</a></li>
      <li><a href="{{ url('/blog') }}" class="hover:text-blue-300">Blog</a></li>
    </ul>
  </nav>

  <!-- Konten -->
  <div class="max-w-6xl mx-auto py-10 px-4">
    <h2 class="text-3xl font-bold text-center mb-8">Daftar Mobil Tersedia</h2>

    @php
      $categories = [
        'Family Car' => [
          ['img' => 'family/fortuner.jpg', 'nama' => 'Fortuner', 'harga' => 800000, 'desc' => 'Gagah, nyaman, dan bertenaga.'],
          ['img' => 'family/avanza.jpg', 'nama' => 'Avanza', 'harga' => 350000, 'desc' => 'Irit, nyaman, cocok buat harian.'],
          ['img' => 'family/innova.jpg', 'nama' => 'Innova', 'harga' => 500000, 'desc' => 'Luas, nyaman buat keluarga besar.'],
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
            <button
              onclick="openModal('{{ $mobil['nama'] }}', {{ $mobil['harga'] }})"
              class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
              Sewa Sekarang
            </button>
          </div>
        @endforeach
      </div>
    @endforeach
  </div>

  <!-- Modal -->
  <div id="sewaModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg max-w-md w-full relative">
      <button class="absolute top-2 right-4 text-2xl font-bold text-gray-500 hover:text-black" onclick="closeModal()">&times;</button>
      <h2 class="text-2xl font-bold mb-4">Form Penyewaan Mobil</h2>
      <form id="formSewa">
        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" id="nama" required class="w-full border p-2 rounded mb-3">

        <label class="block font-semibold mb-1">Email</label>
        <input type="email" id="email" required class="w-full border p-2 rounded mb-3">

        <label class="block font-semibold mb-1">Tanggal Sewa</label>
        <input type="date" id="tanggal" required class="w-full border p-2 rounded mb-3">

        <label class="block font-semibold mb-1">Jumlah Hari</label>
        <input type="number" id="hari" min="1" required class="w-full border p-2 rounded mb-3">

        <label class="block font-semibold mb-1">Mobil</label>
        <input type="text" id="mobil" readonly class="w-full border p-2 rounded mb-3 bg-gray-100">

        <label class="block font-semibold mb-1">Harga per Hari (Rp)</label>
        <input type="number" id="harga" readonly class="w-full border p-2 rounded mb-3 bg-gray-100">

        <label class="block font-semibold mb-1">Total Harga (Rp)</label>
        <input type="number" id="total" readonly class="w-full border p-2 rounded mb-4 bg-gray-100">

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Kirim</button>
      </form>
    </div>
  </div>

  <!-- Script -->
  <script>
    function openModal(mobil, harga) {
      document.getElementById('mobil').value = mobil;
      document.getElementById('harga').value = harga;
      document.getElementById('hari').value = '';
      document.getElementById('total').value = '';
      document.getElementById('sewaModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('sewaModal').classList.add('hidden');
    }

    document.getElementById('hari').addEventListener('input', () => {
      const harga = parseInt(document.getElementById('harga').value);
      const hari = parseInt(document.getElementById('hari').value);
      document.getElementById('total').value = (harga * hari) || '';
    });

    document.getElementById('formSewa').addEventListener('submit', function(e) {
      e.preventDefault();
      alert('Data penyewaan berhasil dikirim!');
      closeModal();
    });
  </script>

</body>
</html>
