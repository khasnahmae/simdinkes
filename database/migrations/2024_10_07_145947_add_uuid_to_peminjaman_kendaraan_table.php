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
            $table->uuid('uuid')->unique()->after('id'); // Tambahkan kolom UUID setelah ID
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman_kendaraan', function (Blueprint $table) {
            $table->dropColumn('uuid'); // Hapus kolom UUID jika rollback
        });
    }
};
