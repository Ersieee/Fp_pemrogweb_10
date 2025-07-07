<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Midtrans</title>
    <!-- Tailwind CSS CDN for basic styling (optional, but good for quick setup) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for better aesthetics */
        body {
            font-family: 'Inter', sans-serif; /* Using Inter font as per instructions */
            background-color: #f3f4f6; /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Full viewport height */
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            background-color: #ffffff; /* White background for the card */
            padding: 32px;
            border-radius: 12px; /* Rounded corners */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Soft shadow */
            text-align: center;
            max-width: 400px; /* Max width for better readability on large screens */
            width: 100%; /* Fluid width */
        }
        h1 {
            color: #1f2937; /* Dark gray text */
            font-size: 1.875rem; /* 30px */
            font-weight: 700; /* Bold */
            margin-bottom: 24px;
        }
        p {
            color: #4b5563; /* Medium gray text */
            font-size: 1.125rem; /* 18px */
            margin-bottom: 16px;
        }
        #pay-button {
            background-color: #4f46e5; /* Indigo 600 */
            color: white;
            padding: 12px 24px;
            border-radius: 8px; /* Rounded corners for button */
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none; /* Remove default button border */
            width: 100%; /* Full width button */
            box-sizing: border-box; /* Include padding in width */
        }
        #pay-button:hover {
            background-color: #4338ca; /* Darker indigo on hover */
        }
    </style>

    <!-- Midtrans Snap JS -->
    <!-- Penting: Gunakan URL yang benar untuk lingkungan Anda:
         - Sandbox (untuk pengembangan/testing): https://app.sandbox.midtrans.com/snap/snap.js
         - Production (untuk live/rilis): https://app.midtrans.com/snap/snap.js
         Pastikan data-client-key mengambil dari konfigurasi Laravel Anda.
    -->
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('app.midtrans_client_key') }}">
    </script>
</head>
<body>
    <div class="container">
        <h1>Konfirmasi Pesanan Anda</h1>
        <p>Nama Produk: Contoh Barang</p>
        <p>Total Harga: **Rp 100.000**</p>
        <button id="pay-button">Bayar Sekarang</button>
    </div>

    <script type="text/javascript">
        // Pastikan DOM sudah sepenuhnya dimuat sebelum menambahkan event listener
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan tombol pembayaran berdasarkan ID
            const payButton = document.getElementById('pay-button');

            // Tambahkan event listener untuk klik tombol
            payButton.onclick = function(){
                // Mengirim permintaan (fetch) ke backend Laravel untuk mendapatkan Snap Token
                // Route 'payment.process' akan memanggil metode processPayment di PaymentController
                fetch('{{ route('payment.process') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // Penting: Sertakan CSRF token untuk keamanan Laravel
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    // Body permintaan bisa berisi data produk, jumlah, dll.
                    // Untuk contoh ini, kita mengirim objek kosong karena data diambil dari controller
                    body: JSON.stringify({})
                })
                .then(response => response.json()) // Menguraikan respons JSON dari server
                .then(data => {
                    // Periksa apakah Snap Token berhasil didapatkan dari respons
                    if (data.snap_token) {
                        // Jika Snap Token ada, tampilkan pop-up pembayaran Midtrans Snap
                        snap.pay(data.snap_token, {
                            // Callback function yang dipanggil saat pembayaran berhasil
                            onSuccess: function(result){
                                /* Implementasi Anda di sini setelah pembayaran sukses */
                                alert("Pembayaran berhasil!");
                                console.log(result);
                                // Redirect pengguna ke halaman status pesanan dengan order_id
                                window.location.href = '/order-status/' + result.order_id;
                            },
                            // Callback function yang dipanggil saat pembayaran masih menunggu (misal: menunggu transfer bank)
                            onPending: function(result){
                                /* Implementasi Anda di sini saat pembayaran pending */
                                alert("Pembayaran Anda sedang diproses!");
                                console.log(result);
                                window.location.href = '/order-status/' + result.order_id;
                            },
                            // Callback function yang dipanggil saat terjadi kesalahan pembayaran
                            onError: function(result){
                                /* Implementasi Anda di sini saat pembayaran gagal */
                                alert("Pembayaran gagal!");
                                console.log(result);
                                window.location.href = '/order-status/' + result.order_id;
                            },
                            // Callback function yang dipanggil saat pengguna menutup pop-up tanpa menyelesaikan pembayaran
                            onClose: function(){
                                /* Implementasi Anda di sini saat pop-up ditutup */
                                alert('Anda menutup pop-up pembayaran tanpa menyelesaikan transaksi.');
                                // Opsional: Anda bisa redirect atau menampilkan pesan lain
                            }
                        });
                    } else {
                        // Jika Snap Token tidak ditemukan atau ada error dari backend
                        alert('Gagal mendapatkan Snap Token: ' + (data.error || 'Terjadi kesalahan tidak diketahui.'));
                    }
                })
                .catch(error => {
                    // Menangani error yang terjadi selama proses fetch (misal: masalah jaringan)
                    console.error('Error fetching Snap Token:', error);
                    alert('Terjadi kesalahan saat memulai pembayaran. Silakan coba lagi.');
                });
            };
        });
    </script>
</body>
</html>
