<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulananIbuHamil extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_pelaksanaan',
        'jumlah_ibu_hamil',
        'jumlah_ibu_nifas',
        'jumlah_ibu_menyusui',
        'jumlah_ibu_hamil_bb_garis_merah',
        'jumlah_ibu_hamil_lila',
        'jumlah_ibu_hamil_risiko_tbc',
        'jumlah_ibu_hamil_mendapat_ttd',
        'jumlah_ibu_hamil_makanan_tambahan_kek',
        'jumlah_ibu_hamil_ikut_kelas',
        'jumlah_ibu_hamil_dirujuk_ke_puskesmas',
        'user_id'
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
