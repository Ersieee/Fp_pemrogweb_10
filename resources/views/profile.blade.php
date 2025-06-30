<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Pengguna</title>
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

  <!-- Header -->
  <div class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">Rental Mobil</h1>

    <!-- Menu Titik Tiga -->
    <div class="relative">
      <button onclick="toggleDropdown()" class="text-gray-600 hover:text-black">
        &#x22EE;
      </button>
      <div id="dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-10">
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Ubah Profil</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Ubah Akun</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Hubungi Kami</a>
      </div>
    </div>
  </div>

  <!-- Profil -->
  <div class="p-6">
    <div class="bg-white p-4 rounded shadow">
      <h2 class="text-lg font-semibold mb-4">Informasi Pengguna</h2>
      <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
      <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
      <p><strong>No Telepon:</strong> {{ Auth::user()->phone }}</p>
    </div>

    <!-- Riwayat Pembelian -->
    <div class="bg-white p-4 mt-6 rounded shadow">
      <h2 class="text-lg font-semibold mb-4">Riwayat Penyewaan Mobil</h2>
      <table class="w-full table-auto border">
        <thead class="bg-gray-200">
          <tr>
            <th class="px-2 py-1 border">Tipe Mobil</th>
            <th class="px-2 py-1 border">ID Pesanan</th>
            <th class="px-2 py-1 border">Tanggal Mulai</th>
            <th class="px-2 py-1 border">Tanggal Selesai</th>
            <th class="px-2 py-1 border">Batas Pengembalian</th>
            <th class="px-2 py-1 border">Total Harga</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td class="px-2 py-1 border">{{ $order->mobil->tipe }}</td>
            <td class="px-2 py-1 border">{{ $order->id }}</td>
            <td class="px-2 py-1 border">{{ $order->start_date }}</td>
            <td class="px-2 py-1 border">{{ $order->end_date }}</td>
            <td class="px-2 py-1 border">{{ $order->return_date }}</td>
            <td class="px-2 py-1 border">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex mt-6 gap-4">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
      </form>
      <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ganti Akun</a>
    </div>
  </div>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById("dropdown");
      dropdown.classList.toggle("hidden");
    }
  </script>
</body>
</html>
