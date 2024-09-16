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
        Schema::create('data_sasarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('jumlah_bayi_1')->nullable();
            $table->integer('jumlah_bayi_2')->nullable();
            $table->integer('jumlah_balita')->nullable();
            $table->integer('jumlah_ibu_hamil')->nullable();
            $table->integer('jumlah_ibu_nifas_menyusui')->nullable();
            $table->integer('jumlah_anak_usia_sekolah')->nullable();
            $table->integer('jumlah_usia_dewasa')->nullable();
            $table->integer('jumlah_lansia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sasarans');
    }
};
