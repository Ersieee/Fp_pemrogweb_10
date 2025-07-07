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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('order_id')->unique(); // ID unik dari sistem Anda
        $table->decimal('amount', 10, 2); // Total harga
        $table->string('status')->default('pending'); // Status: pending, success, failed, challenge, expire
        $table->string('transaction_id')->nullable(); // ID transaksi dari Midtrans
        $table->string('payment_type')->nullable();
        $table->string('gross_amount')->nullable();
        $table->json('raw_response')->nullable(); // Simpan response mentah dari Midtrans
        // Tambahkan kolom lain yang relevan seperti user_id, product_details, dll.
        $table->timestamps();
    });
}                                                                                                                                                           

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
