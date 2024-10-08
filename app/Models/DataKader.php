<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKader extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_hp',
        'jabatan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pertama_kali',
        'pelatihan_diikuti1',
        'sertifikat1',
        'pelatihan_diikuti2',
        'sertifikat2',
        'pelatihan_diikuti3',
        'sertifikat3',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
