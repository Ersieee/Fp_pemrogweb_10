<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals'; // nama tabel di database

    // Boleh mass assignment untuk kolom-kolom ini
    protected $fillable = [
        'user_id',
        'tanggal_sewa',
        'jam_mulai',
        'durasi',
        'total_harga',
        'tipe_mobil',   // kalau di tabel kamu ada kolom tipe mobil
        'batas_pemakaian'
    ];
}
