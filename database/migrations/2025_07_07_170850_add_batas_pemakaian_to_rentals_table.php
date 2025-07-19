<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->string('batas_pemakaian')->nullable();
        });
    }
 
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
             $table->dropColumn('batas_pemakaian');
        });
    }
};
