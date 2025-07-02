<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman User - PACE RENTAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

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

   <div class="container">

        <div class="dashboard-wrapper">
        <div class="profile-card">
            <h1>Profil Anda</h1>
            <div class="profile-content">
                <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-profile.png') }}"
                     alt="Foto Profil" class="profile-photo">
                <div class="profile-info">
                   @if (Auth::check())
                    <p>Selamat datang, {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>No. Telepon:</strong> {{ Auth::user()->phone ?? '08123456789' }}</p>
                        @else
                    <p>Silakan login terlebih dahulu.</p>
                        @endif
                </div>
            </div>

        </div>

        <div class="history-table">
            <h2>Riwayat Penyewaan Anda</h2>
            <table class="rental-history">
               <thead>
    <tr>
        <th>Waktu Sewa</th>
        <th>Durasi</th>
        <th>Waktu Mulai</th>
        <th>Waktu Selesai</th> <!-- Gabungan tanggal + jam selesai -->
        <th>Total Harga</th>
    </tr>
</thead>
<tbody>
    @forelse ($riwayatPenyewaan as $rental)
        <tr>
            <!-- Waktu Sewa -->
            <td>{{ \Carbon\Carbon::parse($rental->tanggal_sewa)->format('d-m-Y') }} {{ \Carbon\Carbon::parse($rental->jam_mulai)->format('H:i') }}</td>

            <!-- Durasi -->
            <td>{{ $rental->durasi }} hari</td>

            <!-- Jam Mulai -->
            <td>{{ \Carbon\Carbon::parse($rental->jam_mulai)->format('H:i') }}</td>

            <!-- Waktu Selesai (Tanggal + Jam selesai berdasarkan durasi hari) -->
            <td>
              {{ \Carbon\Carbon::parse($rental->tanggal_sewa . ' ' . $rental->jam_mulai)->addDays($rental->durasi)->format('d-m-Y H:i') }}
            </td>

            <!-- Total Harga -->
            <td>Rp{{ number_format($rental->total_harga, 0, ',', '.') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Belum melakukan pesanan. Harap pesan terlebih dahulu.</td>
        </tr>
    @endforelse
</tbody>



            </table>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>

</body>
</html>
