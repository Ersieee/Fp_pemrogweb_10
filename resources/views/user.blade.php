<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman User - PACE RENTAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigasi -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ url('/rental') }}"><i class="fas fa-car"></i> Rental</a></li>
            <li><a href="{{ url('/pelayanan') }}"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
            <li><a href="{{ url('/about') }}"><i class="fas fa-users"></i> Tentang Kami</a></li>
            <li><a href="{{ url('/contact') }}"><i class="fas fa-envelope"></i> Kontak</a></li>
            <li><a href="{{ url('/blog') }}"><i class="fas fa-blog"></i> Blog</a></li>
        </ul>
    </nav>

   <div class="container user-dashboard">

        <div class="dashboard-wrapper">
        <div class="profile-card">
            <h1>Profil Anda</h1>
            <div class="profile-content">
                <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-profile.png') }}"
                     alt="Foto Profil" class="profile-photo">
                <div class="profile-info">
                    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>No. Telepon:</strong> {{ Auth::user()->phone ?? 'Belum diisi' }}</p>
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
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
    @forelse ($riwayatPenyewaan as $rental)
        <tr>
            <td>{{ \Carbon\Carbon::parse($rental->tanggal_sewa)->format('d-m-Y') }} 09:00</td>
            <td>{{ $rental->jumlah_hari }} hari</td>
            <td>{{ \Carbon\Carbon::parse($rental->tanggal_sewa)->format('d-m-Y') }}</td>
            <td>09:00</td>
            <td>
                {{ \Carbon\Carbon::parse($rental->tanggal_sewa)
                    ->addDays($rental->jumlah_hari)
                    ->format('d-m-Y') }} 09:00
            </td>
            <td>Rp{{ number_format($rental->total, 0, ',', '.') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Belum melakukan pesanan. Harap pesan terlebih dahulu.</td>
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
