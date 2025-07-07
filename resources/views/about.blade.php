<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - PACE RENTAL</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script> {{-- Pastikan Tailwind CSS CDN ada --}}
    <style>
        /* Gaya tambahan untuk bagian tim, jika diperlukan dan tidak ada di style.css */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
            justify-items: center;
            padding: 20px;
        }
        .team-member-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            text-align: center;
            padding: 16px;
            transition: transform 0.3s ease;
            width: 100%;
            max-width: 250px;
        }
        .team-member-card:hover {
            transform: translateY(-5px);
        }
        .team-member-card img {
            width: 100%;
            height: 180px; /* Tinggi tetap untuk gambar tim */
            object-fit: cover; /* Memastikan gambar mengisi area tanpa distorsi */
            border-radius: 8px;
            margin-bottom: 12px;
        }
        .team-member-card h4 {
            font-size: 1.125rem; /* text-lg */
            font-weight: bold;
            color: #333;
            margin-bottom: 4px;
        }
        .team-member-card p {
            font-size: 0.875rem; /* text-sm */
            color: #666;
        }
    </style>
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

    <div class="container about-page"> {{-- Tambahkan kelas 'about-page' ke container utama --}}
        <div class="profile">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo PACE RENTAL" class="logo mx-auto block">
            <div class="text-center-box">
                <h3>Selamat Datang Di PACE RENTAL</h3>
                <p>PACE RENTAL adalah pilihan tepat untuk Anda yang mencari layanan rental mobil berkualitas dengan harga terjangkau. Berdiri sejak tahun 2010, kami telah melayani ribuan pelanggan dengan dedikasi tinggi, memberikan pengalaman perjalanan yang nyaman dan aman...</p>
                <p>Di PACE RENTAL, kami percaya bahwa mobil bukan hanya alat transportasi, tetapi juga teman perjalanan yang membantu mewujudkan impian Anda. Dari perjalanan bisnis hingga liburan keluarga, kami memiliki berbagai pilihan mobil yang siap menemani Anda ke berbagai tujuan...</p>
                <p class="quote">"Mengutamakan kenyamanan dan keselamatan, menjadikan perjalanan Anda lebih berarti."</p>
            </div>
        </div>

        <h2 class="text-center text-3xl font-bold mt-12 mb-8"></h2> {{-- Sesuaikan H2 ini --}}
        <div class="text-center-box">
            {{-- Bagian gambar tunggal sebelumnya, saya akan komentari atau hapus jika tidak diperlukan --}}
            {{-- <img src="https://placehold.co/800x400/E0E0E0/333333?text=Gambar+Tentang+Kami"
                 alt="Tim PACE RENTAL"
                 class="w-full max-w-2xl mx-auto rounded-lg shadow-md mt-6 mb-8 object-cover"> --}}
        </div>

        {{-- BAGIAN BARU: TIM KAMI --}}
<h2 class="text-center text-3xl font-bold mt-12 mb-8">Tim Kami</h2>
<div class="team-grid">
    {{-- Anggota Tim 1 --}}
    <div class="team-member-card">
        {{-- PATH GAMBAR DIPERBAIKI DI SINI --}}
        <img src="{{ asset('images/ardian.jpeg') }}" alt="Ardian Dwi Sucipto">
        <h4>Ardian Dwi Sucipto</h4>
        <p>23.11.5527</p>
        <p>Team Member</p>
    </div>
    {{-- Anggota Tim 2 --}}
    <div class="team-member-card">
        <img src="{{ asset('images/uga.jpeg') }}" alt="Anugerah Satriyo Kasma Dg Mamase">
        <h4>Anugerah Satriyo Kasma Dg Mamase</h4>
        <h4>23.11.5525</h4>
        <p>Team Member</p>
    </div>
    {{-- Anggota Tim 3 --}}
    <div class="team-member-card">
        <img src="{{ asset('images/ergie.jpeg') }}" alt="Ergie Restu Dwi Maulana">
        <h4>Ergie Restu Dwi Maulana</h4>
        <h4>23.11.5505</h4>
        <p>Team Member</p>
    </div>
    {{-- Anggota Tim 4 --}}
    <div class="team-member-card">
        <img src="{{ asset('images/syahdan.jpeg') }}" alt="Syahdan Basir">
        <h4>Syahdan Basir</h4>
        <h4>23.11.5529</h4>
        <p>Team Member</p>
    </div>
    {{-- Anggota Tim 5 --}}
    <div class="team-member-card">
        <img src="{{ asset('images/abim.jpeg') }}" alt="Abimanyu Syaiful Ahmad Fatahilah">
        <h4>Abimanyu Syaiful Ahmad Fatahilah</h4>
        <h4>23.11.5528</h4>
        <p>Team Member</p>
    </div>
    {{-- Anggota Tim 6 --}}
    <div class="team-member-card">
        <img src="{{ asset('images/dicky.jpeg') }}" alt="Dicky Robyansyah">
        <h4>Dicky Robyansyah</h4>
        <h4>23.11.5564</h4>
        <p>Team Member</p>
    </div>
</div>
{{-- AKHIR BAGIAN BARU: TIM KAMI --}}



    </div> {{-- Penutup div.container --}}

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
                    <img src="{{ asset('images/bri.png') }}" alt="BRI">
                    <img src="{{ asset('images/shopeepay.png') }}" alt="BCA">
                    <img src="{{ asset('images/mandiri.png') }}" alt="Mandiri">
                    <img src="{{ asset('images/visa.png') }}" alt="Visa">
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.querySelector(".about-page .container"); // Sesuaikan selektor
            if(container){
                container.style.opacity = "1";
                container.style.transform = "translateY(0)";
                container.style.transition = "opacity 1s ease, transform 1s ease";
            }
        });
    </script>
</body>
</html>
