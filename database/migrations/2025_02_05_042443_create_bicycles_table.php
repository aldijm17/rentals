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
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id('id_bicycle');
            $table->string('merk', 50);
            $table->string('foto');
            $table->string('tipe', 50);
            $table->string('warna', 30);
            $table->decimal('harga_sewa', 10,2);
            $table->string('deskripsi',300);
            $table->string('status',30);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicycles');
    }
};
