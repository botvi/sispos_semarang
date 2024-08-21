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
        Schema::create('reg_posyandus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('rw');
            $table->foreignId('kecamatan_id');
            $table->foreignId('kelurahan_id');
            $table->string('alamat_lengkap');
            $table->foreignId('user_id');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_posyandus');
    }
};
