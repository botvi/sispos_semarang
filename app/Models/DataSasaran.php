<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSasaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jumlah_bayi_1',
        'jumlah_bayi_2',
        'jumlah_balita',
        'jumlah_ibu_hamil',
        'jumlah_ibu_nifas_menyusui',
        'jumlah_anak_usia_sekolah',
        'jumlah_usia_dewasa',
        'jumlah_lansia',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
