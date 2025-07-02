<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // <-- Tambahkan ini jika Anda menggunakan Sanctum

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens; // <-- Tambahkan HasApiTokens di sini

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone', // Tambahkan kolom 'phone'
        'nik', // Tambahkan kolom 'nik'
        'full_name_ktp', // Tambahkan kolom 'full_name_ktp'
        'dob_ktp', // Tambahkan kolom 'dob_ktp'
        'address_ktp', // Tambahkan kolom 'address_ktp'
        'ktp_image_path', // Tambahkan kolom 'ktp_image_path'
        'selfie_image_path', // Tambahkan kolom 'selfie_image_path'
        'face_verification_status', // Tambahkan kolom 'face_verification_status'
        'last_verification_at', // Tambahkan kolom 'last_verification_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'dob_ktp' => 'date', // Penting: untuk mengkonversi tanggal lahir KTP
            'last_verification_at' => 'datetime', // Penting: untuk mengkonversi timestamp verifikasi terakhir
        ];
    }

    // Relasi dengan model Rental
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
} 