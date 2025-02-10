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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id('id_rental');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_bicycle');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->decimal('total_biaya',10,2);
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
            $table->foreign('id_bicycle')->references('id_bicycle')->on('bicycles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('rentals', function(blueprint $table){
            $table->dropForeign(['id_customer']);
            $table->dropForeign(['id_bicycle']);
        });
        Schema::dropIfExists('rentals');
    }
};
