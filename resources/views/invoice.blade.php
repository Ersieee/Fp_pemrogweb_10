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


<!-- Bagian dalam invoice-container -->
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

        <!-- Tombol untuk buka modal -->
        <button onclick="openModal()" class="btn-rincian">Rincian Pembayaran</button>

        <!-- Modal detail pembayaran -->
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

      <!-- Bagian Metode Pembayaran -->
      <td class="qr-section" style="text-align:center;">
        <label for="metode">Metode Pembayaran:</label><br>
        <select id="metode" name="metode" required>
          <option value=""> TRANSFER BANK </option>
          <option value="BRI">BRI</option>
          <option value="mandiri1">MANDIRI</option>
          <option value="qris">QRIS</option>
        </select>

        <!-- Gambar metode akan muncul di sini -->
        <div id="gambarMetode" style="text-align:center; margin-top:20px;">
          <img id="imgMetode" src="" alt="Gambar Metode Pembayaran" style="width: 100%; max-width: 400px; height: auto; display: none; border-radius: 8px;" />
        </div>
        
        <!-- Tombol Navigasi -->
        <a href="{{ route('rental.index') }}" class="btn-kembali" style="margin-top: 10px;">← Kembali ke Booking</a>
        <a href="{{ route('rental.cetakInvoice', $rental->id) }}" class="btn-kembali" style="background-color:#007bff; margin-top: 10px;">🧾 Cetak Invoice</a>
      </td>
    </tr>
  </table>
</div>

<!-- Script Modal & Gambar -->
<script>
function openModal() {
  document.getElementById("paymentModal").style.display = "block";
}
function closeModal() {
  document.getElementById("paymentModal").style.display = "none";
}

// Ganti gambar berdasarkan metode pembayaran
document.getElementById('metode').addEventListener('change', function () {
  var metode = this.value;
  var img = document.getElementById('imgMetode');
  if (metode) {
    img.src = "{{ asset('images') }}/" + metode + ".png";
    img.style.display = 'block';
  } else {
    img.style.display = 'none';
  }
});
</script>
 