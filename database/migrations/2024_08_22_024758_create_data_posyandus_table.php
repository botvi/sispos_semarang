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
        Schema::create('data_posyandus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('strata_posyandu');
            $table->string('tempat_kegiatan');
            $table->text('keterangan')->nullable();
            $table->string('sk_kelurahan')->nullable();
            $table->string('foto_lokasi')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_posyandus');
    }
};
