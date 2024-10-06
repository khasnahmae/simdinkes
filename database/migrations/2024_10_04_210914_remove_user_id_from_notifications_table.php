<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Menghapus foreign key jika ada
            $table->dropColumn('user_id'); // Menghapus kolom user_id
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Menambahkan kolom kembali jika perlu
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Menambahkan kembali foreign key
        });
    }

};
