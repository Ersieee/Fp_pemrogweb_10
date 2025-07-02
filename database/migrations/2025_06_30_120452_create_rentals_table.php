<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Mengomentari bagian ini karena tabel 'rentals' kemungkinan sudah ada di database.
        // Jika Anda ingin membuat ulang tabel ini (dan kehilangan data), gunakan 'php artisan migrate:fresh'.
        // Jika Anda yakin tabel sudah ada dan strukturnya benar, biarkan bagian ini dikomentari.
        /*
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_mobil');
            $table->date('tanggal_sewa');
            $table->time('jam_mulai');
            $table->integer('durasi');
            $table->integer('total_harga');
            $table->timestamps();
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