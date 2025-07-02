<!DOCTYPE html> 
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Invoice Pembayaran</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    .invoice-container {
      max-width: 900px;
      margin: 30px auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1, h2, h3 {
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    td, th {
      padding: 10px;
      vertical-align: top;
    }
    .qr-section img {
      width: 200px;
      height: 200px;
      border-radius: 8px;
    }
    .btn-kembali {
      display: inline-block;
      margin-top: 20px;
      background: #6c757d;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      color: #fff;
    }
    .btn-kembali:hover { background: #5a6268; }
  </style>
 </head>
<body>

@php
$mobil = $rental->tipe_mobil;
$harga = $rental->total_harga / $rental->durasi;
$hari = $rental->durasi;
$total = $rental->total_harga;
$invoice = 'INV' . str_pad($rental->id, 9, '0', STR_PAD_LEFT);
$batasWaktu = now()->addDay()->format('d M Y H:i') . ' WIB';
@endphp


<div class="invoice-container">
  <h1>Terima Kasih!</h1>
  <h2>Harap Lengkapi Pembayaran</h2>
   <table border="0">
    <tr>
      <td>
        <h3>Detail Pembelian</h3>
        <p>Produk: Sewa Mobil {{ $mobil ?? '-' }}</p>
        <p><strong>Nomor Invoice:</strong> {{ $invoice }}</p>
        <p>Status Transaksi: <strong style="color:orange">PENDING</strong></p>
        <p>Status Pembayaran: <strong style="color:red">UNPAID</strong></p>
        <p>Total Pembayaran: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></p>
         <button onclick="openModal()" class="btn-rincian">Rincian Pembayaran</button>
         <div id="paymentModal" class="modal" style="display:none">
          <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Rincian Pembayaran</h2>
            <p><strong>Nomor Invoice:</strong> {{ $invoice }}</p>
            <p><strong>Produk:</strong> Sewa Mobil {{ $mobil ?? '-' }}</p>
            <p><strong>Harga Sewa Mobil:</strong> Rp {{ number_format($harga, 0, ',', '.') }}</p>
            <p><strong>Jumlah Hari:</strong> {{ $hari }} hari</p>
            <p><strong>Total Pembayaran:</strong> Rp {{ number_format($total, 0, ',', '.') }}</p>
            <p><strong>Metode Pembayaran:</strong> QRIS</p>
            <p><strong>Status Pembayaran:</strong> UNPAID</p>
            <p><strong>Batas Waktu Pembayaran:</strong> {{ $batasWaktu }}</p>
          </div>
        </div>
      </td>
       <td class="qr-section" style="text-align:center;">
        <h3>QRIS Pembayaran</h3>
        <img src="{{ asset('images/qris.png') }}" alt="QRIS">
        <p style="margin-top:10px;">Scan QR untuk bayar</p>
        <a href="{{ route('rental.index') }}" class="btn-kembali">← Kembali ke Booking</a>
      </td>
    </tr>
  </table>
 </div>
 <script>
function openModal() {
  document.getElementById("paymentModal").style.display = "block";
}
function closeModal() {
  document.getElementById("paymentModal").style.display = "none";
}
</script>
 </body>
</html>
