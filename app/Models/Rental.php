<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';

    
    protected $fillable = [
        'user_id',
        'tanggal_sewa',
        'jam_mulai',
        'durasi',
        'total_harga',
        'tipe_mobil',
        'batas_pemakaian'
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
