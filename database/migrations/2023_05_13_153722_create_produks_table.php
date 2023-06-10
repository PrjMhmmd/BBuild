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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->foreignId('ruangan_id');
            $table->foreignId('jenis_id');
            $table->string('nama_barang');
            $table->string('slug')->unique();
            $table->double('harga_barang');
            $table->integer('jumlah_barang');
            $table->text('deskripsi_barang');
            $table->string('image')->nullable();
            $table->timestamp('tanggal_masuk_barang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
