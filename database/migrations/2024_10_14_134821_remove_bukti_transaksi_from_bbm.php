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
            $table->dropColumn('bukti_transaksi'); // Ganti dengan nama kolom yang ingin dihapus
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bbm', function (Blueprint $table) {
            $table->string('bukti_transaksi')->nullable(); // Pastikan tipe data kolom sesuai dengan tipe sebelumnya
        });
    }
};
