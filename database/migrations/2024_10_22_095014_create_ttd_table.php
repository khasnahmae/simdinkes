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
        Schema::create('ttd', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kasie');
            $table->string('ttd_kasie')->nullable();
            $table->string('nama_pimpinan');
            $table->string('ttd_pimpinan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttd');
    }
};
