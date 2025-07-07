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
            // Mengubah tipe kolom tanggal_sewa menjadi datetime
            $table->dateTime('tanggal_sewa')->change();
            // Menambahkan kolom waktu_selesai
            $table->dateTime('waktu_selesai')->nullable()->after('durasi');
            // Jika kolom jam_mulai sudah ada dan tipenya TIME, tidak perlu diubah, biarkan saja.
            // Atau jika jam_mulai tidak ada atau salah tipe, bisa diubah/ditambah di sini:
            // $table->time('jam_mulai')->nullable()->change(); // Jika ingin tipenya TIME
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            // Mengembalikan tanggal_sewa ke tipe date
            $table->date('tanggal_sewa')->change();
            // Menghapus kolom waktu_selesai
            $table->dropColumn('waktu_selesai');
        });
    }
};