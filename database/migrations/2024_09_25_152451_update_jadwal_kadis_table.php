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
        Schema::table('jadwal_kadis', function (Blueprint $table) {
            // Hapus kolom 'tanggal', 'waktu_mulai', dan 'waktu_selesai'
            $table->dropColumn(['tanggal', 'waktu_mulai', 'waktu_selesai']);

            // Tambahkan kolom 'tgl_mulai' dan 'tgl_selesai' dengan tipe 'date'
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_kadis', function (Blueprint $table) {
            // Tambahkan kembali kolom yang dihapus
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');

            // Hapus kolom 'tgl_mulai' dan 'tgl_selesai'
            $table->dropColumn(['tgl_mulai', 'tgl_selesai']);
        });
    }
};
