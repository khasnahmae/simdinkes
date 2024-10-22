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
            $table->dateTime('tanggal_realisasi')->nullable()->after('nominal_realisasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bbm', function (Blueprint $table) {
            $table->dropColumn('tanggal_realisasi');
        });
    }
};
