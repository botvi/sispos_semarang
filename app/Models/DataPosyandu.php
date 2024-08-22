<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPosyandu extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'strata_posyandu',
        'tempat_kegiatan',
        'keterangan',
        'sk_kelurahan',
        'foto_lokasi'
    ];
}
