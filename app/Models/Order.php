<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',          // ID unik pesanan internal Anda (yang juga dikirim ke Midtrans)
        'rental_id',         // Foreign key ke tabel 'rentals'
        'user_id',           // Foreign key ke tabel 'users'
        'amount',            // Total jumlah pembayaran
        'status',            // Status pembayaran utama (e.g., pending, success, failed)
        'midtrans_transaction_id', // ID transaksi dari Midtrans (misal: 123abc-xyz)
        'payment_type',      // Tipe pembayaran dari Midtrans (e.g., qris, bank_transfer)
        'gross_amount',      // Jumlah bruto dari Midtrans
        'status_detail',     // Detail status dari Midtrans (e.g., settlement, pending, deny)
        'raw_response',      // Respons mentah dari Midtrans (untuk debugging)
        'rental_data',       // Tambahkan ini agar bisa diisi secara massal
    ];

    protected $casts = [
        'raw_response' => 'array', // Mengubah kolom raw_response menjadi array/JSON
        'rental_data' => 'array',  // Tambahkan ini untuk meng-cast rental_data sebagai array/JSON
    ];

    /**
     * Define the relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Rental model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }
}
