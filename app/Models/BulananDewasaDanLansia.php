<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulananDewasaDanLansia extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal_pelaksanaan',
        'jumlah_usia_dewasa_risiko_ppok',
        'jumlah_usia_dewasa_gangguan_jiwa',
        'jumlah_lansia_skrining_skl',
        'jumlah_lansia_dirujuk_puskesmas',
        'jumlah_akseptor_kb',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
