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
        Schema::create('peminjaman_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->dateTime('mulai');
            $table->dateTime('selesai');
            $table->string('keterangan');
            $table->enum('status', ['booked','available'])->default('available');
            $table->foreign('pegawai_id')->references('id')->on('pegawai'); 
            $table->foreign('kendaraan_id')->references('id')->on('kendaraan'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_kendaraan');
    }
};
