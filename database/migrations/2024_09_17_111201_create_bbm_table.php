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
        Schema::create('bbm', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('nopol');
            $table->string('nama_kendaraan');
            $table->double('nominal', 15, 2);
            $table->string('status')->default('Pengajuan');
            $table->foreign('nopol')->references('id')->on('kendaraan');
            $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bbm');
    }
};
