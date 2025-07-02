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
        // Mengomentari bagian ini karena tabel 'rentals' sudah ada dari migrasi lain (2025_06_30_120452).
        // Jika Anda ingin membuat ulang tabel ini (dan kehilangan data), gunakan 'php artisan migrate:fresh'.
        // Jika Anda yakin tabel sudah ada dan strukturnya benar, biarkan bagian ini dikomentari.
        /*
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // Jika ada kolom-kolom lain di migrasi ini, pastikan juga masuk di dalam komentar ini
            // $table->unsignedBigInteger('user_id');
            // $table->string('nama_mobil');
            // $table->date('tanggal_sewa');
            // $table->time('jam_mulai');
            // $table->integer('durasi');
            // $table->integer('total_harga');
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
}; 