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
        Schema::create('bulanan_balitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // Menambahkan user_id sebagai foreign key
            $table->date('tanggal_pelaksanaan'); // Tanggal Pelaksanaan Posyandu
            $table->integer('jumlah_sasaran_balita'); // Jumlah Sasaran Balita (S)
            $table->integer('jumlah_balita_kms')->nullable(); // Jumlah Balita Mempunyai KMS/Buku KIA (K)
            $table->integer('jumlah_balita_datang')->nullable(); // Jumlah Balita Datang (D)
            $table->integer('jumlah_balita_naik_timbangan')->nullable(); // Jumlah Balita Naik Timbangan (N)
            $table->integer('jumlah_balita_turun_timbangan')->nullable(); // Jumlah Balita Turun Timbangan
            $table->integer('jumlah_balita_bgm')->nullable(); // Jumlah Balita Dibawah Garis Merah (BGM)
            $table->integer('jumlah_balita_sakit')->nullable(); // Jumlah Balita Sakit
            $table->integer('jumlah_balita_vitamin_feb')->nullable(); // Jumlah Balita Mendapat Vitamin A (Februari)
            $table->integer('jumlah_balita_vitamin_aug')->nullable(); // Jumlah Balita Mendapat Vitamin A (Agustus)
            $table->integer('jumlah_balita_dirujuk')->nullable(); // Jumlah Balita Dirujuk ke Puskesmas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulanan_balitas');
    }
};
