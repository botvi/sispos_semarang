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
        Schema::create('data_kaders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('jabatan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->date('pertama_kali');
            $table->string('pelatihan_diikuti1');
            $table->string('sertifikat1')->nullable();
            $table->string('pelatihan_diikuti2');
            $table->string('sertifikat2')->nullable();
            $table->string('pelatihan_diikuti3');
            $table->string('sertifikat3')->nullable();
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kaders');
    }
};
