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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->string('id')->primary(); // Kolom id input manual (kode unik)
            $table->uuid('uuid')->unique(); // UUID tambahan untuk keamanan
            $table->string('nama_kegiatan');
            $table->decimal('alokasi_dana', 15, 2); // Alokasi dana
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
