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
        Schema::table('bbm', function (Blueprint $table) {
            // Menambahkan kolom realisasi dengan default 'Menunggu Realisasi'
            $table->enum('realisasi', ['Menunggu Realisasi', 'Sudah Direalisasi'])->default('Menunggu Realisasi');
            // Menambahkan kolom nominal_realisasi untuk menyimpan nominal realisasi
            $table->decimal('nominal_realisasi', 10, 2)->nullable();
            // Menambahkan kolom bukti_transaksi untuk menyimpan file bukti transaksi
            $table->string('bukti_transaksi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bbm', function (Blueprint $table) {
            $table->dropColumn('realisasi');
            $table->dropColumn('nominal_realisasi');
            $table->dropColumn('bukti_transaksi');
        });
    }
};
