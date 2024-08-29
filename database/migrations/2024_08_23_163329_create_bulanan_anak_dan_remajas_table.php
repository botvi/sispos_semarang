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
        Schema::create('bulanan_anak_dan_remajas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // Menambahkan user_id sebagai foreign key
            $table->date('tanggal_pelaksanaan'); // Tanggal Pelaksanaan Posyandu
            $table->integer('kunjungan_anak_remaja'); // Jumlah Kunjungan Anak dan Remaja (7-18 tahun)
            $table->integer('imt_kurus'); // Jumlah Remaja ≥15 tahun IMT : Kurus
            $table->integer('imt_gemuk'); // Jumlah Remaja ≥15 tahun IMT : Gemuk
            $table->integer('imt_obesitas'); // Jumlah Remaja ≥15 tahun IMT : Obesitas
            $table->integer('imt_normal'); // Jumlah Remaja ≥15 tahun IMT : Normal
            $table->integer('td_rendah'); // Jumlah Remaja ≥15 tahun Tekanan Darah: Rendah
            $table->integer('td_tinggi'); // Jumlah Remaja ≥15 tahun Tekanan Darah: Tinggi
            $table->integer('td_normal'); // Jumlah Remaja ≥15 tahun Tekanan Darah: Normal
            $table->integer('gula_darah_rendah'); // Jumlah Remaja ≥15 tahun Gula Darah: Rendah
            $table->integer('gula_darah_tinggi'); // Jumlah Remaja ≥15 tahun Gula Darah: Tinggi
            $table->integer('remaja_putri_anemia'); // Jumlah Remaja Putri Anemia
            $table->integer('tidak_anemia'); // Jumlah Remaja Putri Anemia
            $table->integer('risiko_tbc'); // Jumlah Anak dan Remaja berisiko TBC (punya gejala TBC > 2)
            $table->integer('masalah_kesehatan'); // Jumlah Anak Sekolah dan Remaja mempunyai Masalah Kesehatan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulanan_anak_dan_remajas');
    }
};
