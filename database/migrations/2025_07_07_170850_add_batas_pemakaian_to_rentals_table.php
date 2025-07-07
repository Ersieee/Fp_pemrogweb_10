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
            // Tambahkan kolom 'batas_pemakaian' sebagai string.
            // Sesuaikan tipe data jika ini seharusnya angka (integer/decimal)
            $table->string('batas_pemakaian')->nullable()->after('tipe_mobil');
            // Menggunakan ->nullable() jika kolom ini bisa kosong.
            // Jika selalu ada nilai, hapus ->nullable()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            // Hapus kolom 'batas_pemakaian' jika migrasi di-rollback
            $table->dropColumn('batas_pemakaian');
        });
    }
};