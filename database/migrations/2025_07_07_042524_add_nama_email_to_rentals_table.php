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
        Schema::table('rentals', function (Blueprint $table) {
            // Tambahkan kolom 'nama' dan 'email'
            // Pastikan tipe data dan properti (nullable) sesuai kebutuhan Anda
            // Saya menempatkannya setelah 'user_id'. Anda bisa menyesuaikan urutannya.
            // if (!Schema::hasColumn('rentals', 'nama')) { // Cek jika kolom belum ada
                $table->string('nama')->nullable()->after('user_id');
            // }
            // if (!Schema::hasColumn('rentals', 'email')) { // Cek jika kolom belum ada
                $table->string('email')->nullable()->after('nama');
            // }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            // Hapus kolom 'nama' dan 'email' jika migrasi di-rollback
            // Pastikan kolom ada sebelum mencoba menghapusnya
            if (Schema::hasColumn('rentals', 'nama')) {
                $table->dropColumn('nama');
            }
            if (Schema::hasColumn('rentals', 'email')) {
                $table->dropColumn('email');
            }
        });
    }
};
