<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - Midtrans</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            background-color: #ffffff;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 9999px;
            font-weight: 600;
            margin-top: 16px;
            font-size: 1rem;
        }
        .status-pending { background-color: #fcd34d; color: #92400e; }
        .status-success { background-color: #a7f3d0; color: #065f46; }
        .status-failed { background-color: #fca5a5; color: #991b1b; }
        .status-challenge { background-color: #bfdbfe; color: #1e40af; }
        .status-expired { background-color: #d1d5db; color: #374151; }
        .btn {
            display: inline-block;
            margin-top: 24px;
            margin-right: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-back {
            background-color: #6b7280;
        }
        .btn-back:hover {
            background-color: #4b5563;
        }
        .btn-invoice {
            background-color: #10b981;
        }
        .btn-invoice:hover {
            background-color: #059669;
        }
        .btn-print {
            background-color: #3b82f6;
        }
        .btn-print:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Status Pesanan Anda</h1>

        @if ($rental)
            <p>Order ID: <strong>{{ $rental->pg_transaction_id }}</strong></p>
            <p>Jumlah: <strong>Rp {{ number_format($rental->total_harga, 0, ',', '.') }}</strong></p>
            <p>Tipe Pembayaran: <strong>{{ ucfirst($rental->payment_type ?? 'N/A') }}</strong></p>
            <p>ID Transaksi Midtrans: <strong>{{ $rental->midtrans_transaction_id ?? 'N/A' }}</strong></p>

            @php
                $status = $rental->status_transaksi;
                $statusClass = match ($status) {
                    'pending' => 'status-pending',
                    'success' => 'status-success',
                    'failed' => 'status-failed',
                    'challenge' => 'status-challenge',
                    'expired' => 'status-expired',
                    default => '',
                };
            @endphp

            <div class="status-badge {{ $statusClass }}">
                Status Pembayaran: {{ ucfirst($status) }}
            </div>

            @switch($status)
                @case('pending')
                    <p class="mt-4 text-gray-600">Silakan selesaikan pembayaran Anda.</p>
                    @break
                @case('success')
                    <p class="mt-4 text-gray-600">Pembayaran berhasil! Pesanan Anda sedang diproses.</p>

                    {{-- Tombol lihat invoice --}}
                    <a href="{{ route('invoice.show', $rental->id) }}" class="btn btn-invoice">Lihat Invoice</a>

                    {{-- Tombol cetak invoice PDF --}}
                    <a href="{{ route('rental.cetakInvoice', $rental->id) }}" class="btn btn-print" target="_blank">Cetak Invoice</a>
                    @break
                @case('failed')
                    <p class="mt-4 text-gray-600">Pembayaran gagal. Silakan coba lagi.</p>
                    @break
                @case('challenge')
                    <p class="mt-4 text-gray-600">Pembayaran Anda sedang diverifikasi.</p>
                    @break
                @case('expired')
                    <p class="mt-4 text-gray-600">Waktu pembayaran telah habis. Pesanan dibatalkan.</p>
                    @break
            @endswitch
        @else
            <p class="text-red-500">Detail pesanan tidak ditemukan.</p>
        @endif

        <a href="{{ route('rental.index') }}" class="btn btn-back">Kembali ke Halaman Rental</a>
    </div>
</body>
</html>
