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
        // Tambahkan kolom uuid pada tabel ruangans
        Schema::table('ruangans', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id')->unique();
        });

        // Tambahkan kolom uuid pada tabel peminjaman_ruangans
        Schema::table('peminjaman_ruangans', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ruangans', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });

        Schema::table('peminjaman_ruangans', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
