<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
        <!-- Foto Profil -->
        <div class="flex flex-col items-center">
            <img src="https://via.placeholder.com/120" alt="Foto Profil" class="w-28 h-28 rounded-full mb-4">
            <h2 class="text-2xl font-semibold mb-2">Profil Pengguna</h2>
        </div>

        <!-- Info Akun -->
        <div class="mb-4">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $user->phone }}</p>
        </div>

        <hr class="my-4">

        <!-- Riwayat Penyewaan -->
        <div>
            <h3 class="text-xl font-semibold mb-2">Riwayat Penyewaan</h3>

            @if($riwayat->isEmpty())
                <p class="text-gray-500">Belum pernah melakukan pembelian. Silakan pesan terlebih dahulu.</p>
            @else
                @foreach($riwayat as $item)
                    <div class="border p-3 rounded-lg mb-3 bg-gray-50">
                        <p><strong>Tipe Mobil:</strong> {{ $item->tipe_mobil }}</p>
                        <p><strong>Lama Penyewaan:</strong> {{ $item->lama_sewa }} hari</p>
                        <p><strong>Waktu Penyewaan:</strong> {{ $item->tanggal_mulai }} {{ $item->jam_mulai }} WIB sampai {{ $item->tanggal_selesai }} {{ $item->jam_selesai }} WIB</p>
                        <p><strong>Total Harga:</strong> Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

</body>
</html>
