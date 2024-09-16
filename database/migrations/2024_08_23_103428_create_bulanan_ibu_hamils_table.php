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
        Schema::create('bulanan_ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // Menambahkan user_id sebagai foreign key
            $table->date('tanggal_pelaksanaan'); // Tanggal Pelaksanaan Posyandu
            $table->integer('jumlah_ibu_hamil')->nullable();
            $table->integer('jumlah_ibu_nifas')->nullable();
            $table->integer('jumlah_ibu_menyusui')->nullable();
            $table->integer('jumlah_ibu_hamil_nifas_menyusui')->nullable();
            $table->integer('jumlah_ibu_hamil_bb_garis_merah')->nullable();
            $table->integer('jumlah_ibu_hamil_lila')->nullable();
            $table->integer('jumlah_ibu_hamil_risiko_tbc')->nullable();
            $table->integer('jumlah_ibu_hamil_mendapat_ttd')->nullable();
            $table->integer('jumlah_ibu_hamil_makanan_tambahan_kek')->nullable();
            $table->integer('jumlah_ibu_hamil_ikut_kelas')->nullable();
            $table->integer('jumlah_ibu_hamil_dirujuk_ke_puskesmas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulanan_ibu_hamils');
    }
};
