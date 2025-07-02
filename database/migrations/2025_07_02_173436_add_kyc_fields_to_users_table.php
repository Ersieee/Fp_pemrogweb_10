<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom 'phone' terlebih dahulu (jika belum ada)
            // Ini agar kolom KYC lainnya dapat diposisikan setelahnya.
            // Jika 'phone' sudah ada dari migrasi lain, baris ini tidak akan melakukan apa-apa.
            // Namun, untuk memastikan urutan yang benar, lebih baik ada migrasi terpisah untuk 'phone' dengan timestamp yang lebih awal.
            // Untuk skenario ini, kita anggap 'phone' akan dibuat oleh migrasi lain yang berhasil atau sudah ada.
            // Jika 'phone' belum ada, baris ini akan menambahkan 'phone' setelah 'email'.
            // Karena Anda memiliki migrasi terpisah untuk phone, baris ini bisa dihilangkan atau disesuaikan.
            // Saya akan menempatkan 'phone' di sini, tapi ingat bahwa ideally harusnya dari migrasi phone yang terpisah.
            // PENTING: Jika Anda sudah memiliki migrasi `add_phone_to_users_table` dengan timestamp yang lebih baru,
            // baris `after('email')` ini di kolom `nik` akan error jika `phone` belum ada.
            // Skenario terbaik adalah memastikan migrasi `phone` berjalan DULU.

            // Kolom telepon
            // Jika Anda sudah memiliki file migrasi 'add_phone_to_users_table' yang akan dijalankan
            // sebelum migrasi ini, Anda TIDAK perlu menambahkan baris ini di sini.
            // Namun, jika Anda ingin memastikan phone ada di migrasi ini,
            // dan Anda belum menjalankannya di migrasi terpisah, maka bisa ditambahkan.
            // Asumsi: migrasi phone terpisah sudah/akan dijalankan.
            // Jika Anda ingin phone ditambahkan di sini, hapus migrasi phone yang terpisah,
            // dan pastikan timestamp migrasi ini lebih awal dari yang lain yang membutuhkannya.
            // Karena kita sudah membuat migrasi terpisah untuk phone, saya akan asumsikan itu yang dipakai.
            // Jadi saya akan fokus pada kolom KYC dan mengubah `after('email')` menjadi `after('phone')` untuk `nik`.

            // Kolom-kolom untuk verifikasi KTP & Wajah
            // NIK dari KTP (penting dan harus unik)
            // PENTING: Jika kolom 'phone' belum ada di tabel 'users' saat migrasi ini dijalankan,
            // maka `->after('phone')` akan menyebabkan error.
            // Pastikan migrasi `add_phone_to_users_table` sudah dijalankan dan berhasil SEBELUM migrasi ini.
            $table->string('nik', 16)->unique()->nullable()->after('phone'); // NIK, 16 digit, unik, opsional, setelah 'phone'
            // Nama lengkap sesuai KTP
            $table->string('full_name_ktp')->nullable()->after('name'); // Posisikan setelah 'name'
            // Tanggal lahir sesuai KTP
            $table->date('dob_ktp')->nullable()->after('full_name_ktp');
            // Alamat sesuai KTP
            $table->text('address_ktp')->nullable()->after('dob_ktp');
            // Path/URL ke gambar KTP di storage
            $table->string('ktp_image_path')->nullable()->after('address_ktp');
            // Path/URL ke gambar selfie di storage
            $table->string('selfie_image_path')->nullable()->after('ktp_image_path');
            // Status verifikasi wajah
            $table->enum('face_verification_status', ['PENDING', 'VERIFIED', 'FAILED', 'MANUAL_REVIEW'])
                  ->default('PENDING')
                  ->after('selfie_image_path');
            // Timestamp verifikasi terakhir
            $table->timestamp('last_verification_at')->nullable()->after('face_verification_status');
            // ID transaksi dari API KYC (opsional)
            $table->string('verification_transaction_id')->nullable()->after('last_verification_at');

            // Menambahkan index untuk NIK agar pencarian lebih cepat
            $table->index('nik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus index terlebih dahulu
            $table->dropIndex(['nik']);

            // Menghapus kolom-kolom yang ditambahkan di metode 'up'
            $table->dropColumn([
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