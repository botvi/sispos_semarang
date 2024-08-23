<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulananBalita extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal_pelaksanaan',
        'jumlah_sasaran_balita',
        'jumlah_balita_kms',
        'jumlah_balita_datang',
        'jumlah_balita_naik_timbangan',
        'jumlah_balita_turun_timbangan',
        'jumlah_balita_bgm',
        'jumlah_balita_sakit',
        'jumlah_balita_vitamin_feb',
        'jumlah_balita_vitamin_aug',
        'jumlah_balita_dirujuk',
    ];

    /**
     * Get the user that owns the PosyanduData.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
