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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // Auto increment id
            $table->uuid('uuid')->unique(); // UUID tambahan untuk keamanan
            $table->unsignedBigInteger('detail_belanja_id'); // Foreign key ke tabel detail belanja dengan tipe unsignedBigInteger            $table->string('nama_kegiatan');
            $table->integer('qty');
            $table->string('satuan');
            $table->decimal('harga', 15, 2);
            $table->decimal('jumlah', 15, 2);
            $table->date('tanggal_transaksi');
            $table->string('nama_penyedia');
            $table->timestamps();

            // Relasi dengan tabel detail belanja menggunakan id
            $table->foreign('detail_belanja_id')->references('id')->on('detail_belanjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
