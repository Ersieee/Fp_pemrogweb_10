<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            // Periksa apakah kolom 'nama_mobil' ada sebelum menghapusnya
            if (Schema::hasColumn('rentals', 'nama_mobil')) {
                $table->dropColumn('nama_mobil');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            // Jika Anda ingin bisa mengembalikan kolom ini (misalnya untuk rollback)
            // Anda perlu mendefinisikan ulang kolom 'nama_mobil' di sini.
            // Pastikan properti seperti nullable(), default(), dll. sesuai dengan definisi aslinya.
            // Contoh:
            // $table->string('nama_mobil')->nullable()->after('tipe_mobil');
            // Namun, jika Anda yakin tidak akan rollback, Anda bisa biarkan kosong.
        });
    }
};