<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';

    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     * Pastikan semua kolom ini ada di tabel 'rentals' di database Anda.
     */
    // app/Models/Rental.php
protected $fillable = [
    'user_id', // Pastikan ini ada dan diisi jika user login
    'nama',
    'email',
    'tanggal_sewa',
    'jam_mulai',
    'durasi',
    'total_harga',
    'tipe_mobil', // Pastikan hanya ini, HAPUS 'nama_mobil' jika ada
    'batas_pemakaian',
    'waktu_selesai',
    'status_transaksi',
    'status_pembayaran',
    'pg_transaction_id',
    'qris_image_url',
    'midtrans_transaction_id',
    'payment_type',
    'gross_amount',
    'raw_response',
];

protected $casts = [
    'tanggal_sewa' => 'datetime',
    'waktu_selesai' => 'datetime',
    'raw_response' => 'array',
];

    /**
     * Relasi dengan model User.
     * Sebuah rental dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
