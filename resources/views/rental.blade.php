<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rental Mobil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome dari CDN aman -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Midtrans Snap JS -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey') }}">
</script>
</head>
<body class="blog-page">
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
                            <button onclick="openModal('{{ $mobil['nama'] }}', '{{ $mobil['harga'] }}')"
                                class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Sewa Sekarang</button>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <!-- Modal Form -->
        <div id="sewaModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center overflow-auto">
            <div class="bg-white p-6 rounded-lg max-w-md w-full relative overflow-y-auto max-h-screen">
                <button class="absolute top-2 right-4 text-2xl font-bold text-gray-500 hover:text-black" onclick="closeModal()">&times;</button>
                <h2 class="text-2xl font-bold mb-4">Form Penyewaan Mobil</h2>
                <form id="rentalForm">
                    @csrf
                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Nama</label>
                    <input type="text" name="nama" id="nama" required class="w-full border p-2 rounded mb-3">

                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" required class="w-full border p-2 rounded mb-3">

                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Tanggal Sewa</label>
                    <input type="date" name="tanggal_sewa" id="tanggal_sewa" required class="w-full border p-2 rounded mb-3">

                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" id="waktu_mulai" value="09:00" required class="w-full border p-2 rounded mb-3">

                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Jumlah Hari</label>
                    <input type="number" name="durasi" id="hari" min="1" required class="w-full border p-2 rounded mb-3">

                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Mobil</label>
                    <input type="text" name="tipe_mobil" id="mobil" readonly class="w-full border p-2 rounded mb-3 bg-gray-100 cursor-not-allowed">

                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Harga per Hari (Rp)</label>
                    <input type="number" name="harga" id="harga" readonly class="w-full border p-2 rounded mb-3 bg-gray-100 cursor-not-allowed">

                    <label class="block text-left text-gray-700 text-sm font-bold mb-2">Total Harga (Rp)</label>
                    <input type="number" name="total_harga" id="total" readonly class="w-full border p-2 rounded mb-4 bg-gray-100 cursor-not-allowed">

                    <button type="button" id="initiatePaymentButton" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Lanjutkan Pembayaran</button>
                </form>
            </div>
        </div>
    </main>

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
        }

        function closeModal() {
            document.getElementById('sewaModal').classList.add('hidden');
        }

        document.getElementById('hari').addEventListener('input', () => {
            const harga = parseInt(document.getElementById('harga').value);
            const hari = parseInt(document.getElementById('hari').value);
            document.getElementById('total').value = (harga * hari) || '';
        });

        document.getElementById('initiatePaymentButton').addEventListener('click', async () => {
            const form = document.getElementById('rentalForm');
            const formData = new FormData(form);
            const data = {};
            for (let [key, value] of formData.entries()) {
                data[key] = value;
            }

            if (!data.nama || !data.email || !data.tanggal_sewa || !data.waktu_mulai || !data.durasi || !data.tipe_mobil || !data.harga || !data.total_harga) {
                alert('Mohon lengkapi semua data penyewaan.');
                return;
            }

            try {
                const response = await fetch('{{ route('rental.initiatePayment') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (result.snap_token) {
                    closeModal();
                    snap.pay(result.snap_token, {
                        onSuccess: function(midtransResult){
                            alert("Pembayaran berhasil!");
                            window.location.href = '/order-status/' + midtransResult.order_id;
                        },
                        onPending: function(midtransResult){
                            alert("Pembayaran sedang diproses!");
                            window.location.href = '/order-status/' + midtransResult.order_id;
                        },
                        onError: function(midtransResult){
                            alert("Pembayaran gagal!");
                            window.location.href = '/order-status/' + midtransResult.order_id;
                        },
                        onClose: function(){
                            alert('Anda menutup pop-up pembayaran.');
                        }
                    });
                } else {
                    alert('Gagal memulai pembayaran: ' + (result.error || 'Terjadi kesalahan tidak diketahui.'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan jaringan atau server.');
            }
        });
    </script>
</body>
</html>
