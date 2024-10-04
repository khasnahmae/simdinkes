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
            $table->uuid('uuid')->unique()->after('id'); // Menambahkan kolom uuid setelah kolom id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_kadis', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
