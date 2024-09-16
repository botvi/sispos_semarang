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
        Schema::create('bulanan_dewasa_dan_lansias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // Menambahkan user_id sebagai foreign key
            $table->date('tanggal_pelaksanaan'); // Tanggal Pelaksanaan Posyandu
            $table->integer('jumlah_usia_dewasa_risiko_ppok');
            $table->integer('jumlah_usia_dewasa_gangguan_jiwa');
            $table->integer('jumlah_lansia_skrining_skl');
            $table->integer('jumlah_lansia_dirujuk_puskesmas');
            $table->integer('jumlah_akseptor_kb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulanan_dewasa_dan_lansias');
    }
};
