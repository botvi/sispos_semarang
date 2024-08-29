<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulananAnakDanRemaja extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal_pelaksanaan',
        'kunjungan_anak_remaja',
        'imt_kurus',
        'imt_gemuk',
        'imt_obesitas',
        'imt_normal',
        'td_rendah',
        'td_tinggi',
        'td_normal',
        'gula_darah_rendah',
        'gula_darah_tinggi',
        'remaja_putri_anemia',
        'tidak_anemia',
        'risiko_tbc',
        'masalah_kesehatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
