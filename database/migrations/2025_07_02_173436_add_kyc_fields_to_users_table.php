<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom phone setelah email
            $table->string('phone')->nullable()->after('email');

            // Kolom NIK (harus unik, 16 digit)
            $table->string('nik', 16)->unique()->nullable()->after('phone');

            // Nama lengkap sesuai KTP
            $table->string('full_name_ktp')->nullable()->after('name');

            // Tanggal lahir dari KTP
            $table->date('dob_ktp')->nullable()->after('full_name_ktp');

            // Alamat sesuai KTP
            $table->text('address_ktp')->nullable()->after('dob_ktp');

            // Path ke gambar KTP
            $table->string('ktp_image_path')->nullable()->after('address_ktp');

            // Path ke gambar selfie
            $table->string('selfie_image_path')->nullable()->after('ktp_image_path');

            // Status verifikasi wajah
            $table->enum('face_verification_status', ['PENDING', 'VERIFIED', 'FAILED', 'MANUAL_REVIEW'])
                  ->default('PENDING')
                  ->after('selfie_image_path');

            // Timestamp verifikasi terakhir
            $table->timestamp('last_verification_at')->nullable()->after('face_verification_status');

            // ID transaksi dari API KYC
            $table->string('verification_transaction_id')->nullable()->after('last_verification_at');

            // Index untuk pencarian NIK
            $table->index('nik');
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus index nik dulu
            $table->dropIndex(['nik']);

            // Hapus kolom-kolom yang ditambahkan
            $table->dropColumn([
                'phone',
                'nik',
                'full_name_ktp',
                'dob_ktp',
                'address_ktp',
                'ktp_image_path',
                'selfie_image_path',
                'face_verification_status',
                'last_verification_at',
                'verification_transaction_id'
            ]);
        });
    }
};
