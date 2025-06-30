<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tipe_mobil')->nullable();
            $table->date('tanggal_sewa');
            $table->time('jam_mulai');
            $table->integer('durasi');
            $table->date('batas_pemakaian')->nullable();
            $table->integer('total_harga');
            $table->timestamps();

            // relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
