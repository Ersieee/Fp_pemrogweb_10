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
            // Tambahkan kolom status_transaksi
            if (!Schema::hasColumn('rentals', 'status_transaksi')) {
                $table->string('status_transaksi')->default('pending')->after('waktu_selesai');
            }
            // Tambahkan kolom status_pembayaran
            if (!Schema::hasColumn('rentals', 'status_pembayaran')) {
                $table->string('status_pembayaran')->default('belum_bayar')->after('status_transaksi');
            }
            // Tambahkan kolom pg_transaction_id (Order ID yang dikirim ke Midtrans)
            if (!Schema::hasColumn('rentals', 'pg_transaction_id')) {
                $table->string('pg_transaction_id')->nullable()->unique()->after('status_pembayaran');
            }
            // Tambahkan kolom qris_image_url (jika Anda berencana menyimpannya, meskipun null untuk Snap)
            if (!Schema::hasColumn('rentals', 'qris_image_url')) {
                $table->string('qris_image_url')->nullable()->after('pg_transaction_id');
            }
            // Tambahkan kolom midtrans_transaction_id (ID transaksi dari Midtrans)
            if (!Schema::hasColumn('rentals', 'midtrans_transaction_id')) {
                $table->string('midtrans_transaction_id')->nullable()->after('qris_image_url');
            }
            // Tambahkan kolom payment_type (tipe pembayaran dari Midtrans)
            if (!Schema::hasColumn('rentals', 'payment_type')) {
                $table->string('payment_type')->nullable()->after('midtrans_transaction_id');
            }
            // Tambahkan kolom gross_amount (jumlah bruto dari Midtrans)
            if (!Schema::hasColumn('rentals', 'gross_amount')) {
                $table->decimal('gross_amount', 10, 2)->nullable()->after('total_harga'); // Sesuaikan posisi
            }
            // Tambahkan kolom raw_response (respons mentah dari Midtrans)
            if (!Schema::hasColumn('rentals', 'raw_response')) {
                $table->json('raw_response')->nullable()->after('gross_amount');
            }

            // Tambahkan user_id jika belum ada di tabel rentals
            if (!Schema::hasColumn('rentals', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->after('id');
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
            // Hapus kolom dalam urutan terbalik dari penambahannya
            if (Schema::hasColumn('rentals', 'raw_response')) {
                $table->dropColumn('raw_response');
            }
            if (Schema::hasColumn('rentals', 'gross_amount')) {
                $table->dropColumn('gross_amount');
            }
            if (Schema::hasColumn('rentals', 'payment_type')) {
                $table->dropColumn('payment_type');
            }
            if (Schema::hasColumn('rentals', 'midtrans_transaction_id')) {
                $table->dropColumn('midtrans_transaction_id');
            }
            if (Schema::hasColumn('rentals', 'qris_image_url')) {
                $table->dropColumn('qris_image_url');
            }
            if (Schema::hasColumn('rentals', 'pg_transaction_id')) {
                $table->dropColumn('pg_transaction_id');
            }
            if (Schema::hasColumn('rentals', 'status_pembayaran')) {
                $table->dropColumn('status_pembayaran');
            }
            if (Schema::hasColumn('rentals', 'status_transaksi')) {
                $table->dropColumn('status_transaksi');
            }
            // Hapus user_id jika Anda menambahkannya di migrasi ini
            if (Schema::hasColumn('rentals', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }
        });
    }
};