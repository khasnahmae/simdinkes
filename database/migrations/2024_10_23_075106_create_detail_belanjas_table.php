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
        Schema::create('detail_belanjas', function (Blueprint $table) {
            $table->id(); // Auto increment id
            $table->uuid('uuid')->unique(); // UUID tambahan untuk keamanan
            $table->string('belanja_id'); // Foreign key ke tabel belanja
            $table->string('nama_kegiatan');
            $table->integer('qty');
            $table->string('satuan');
            $table->decimal('harga', 15, 2);
            $table->decimal('jumlah', 15, 2);
            $table->timestamps();

            // Relasi dengan tabel belanja menggunakan id
            $table->foreign('belanja_id')->references('id')->on('belanjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_belanjas');
    }
};
