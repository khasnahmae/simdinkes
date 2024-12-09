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
        Schema::create('belanjas', function (Blueprint $table) {
            $table->string('id')->primary(); // Kolom id input manual (kode unik)
            $table->uuid('uuid')->unique(); // UUID tambahan untuk keamanan
            $table->string('kegiatan_id'); // Foreign key ke tabel kegiatan
            $table->string('nama_belanja');
            $table->decimal('alokasi_dana', 15, 2);
            $table->timestamps();

            // Relasi dengan tabel kegiatan menggunakan id
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('belanjas');
    }
};
