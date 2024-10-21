<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->text('deskripsi');
            $table->bigInteger('harga_total');
            $table->integer('rating');
            $table->integer('total_pembelian');
            $table->string('destinasi');
            $table->string('hotel');
            $table->string('transport');
            $table->text('layanan_tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packets');
    }
};
