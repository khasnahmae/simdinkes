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
        Schema::table('peminjaman_kendaraan', function (Blueprint $table) {
            $table->string('keterangan')->change(); // Atau gunakan $table->text('keterangan')->change(); untuk tipe text
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman_kendaraan', function (Blueprint $table) {
            $table->dateTime('keterangan')->change();
        });
    }
};
