<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegPosyandu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'rw', 'rt', 'puskesmas_id', 'kecamatan_id', 'kelurahan_id', 'alamat_lengkap', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function kecamatan()
    // {
    //     return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    // }

    // public function kelurahan()
    // {
    //     return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    // }
    public function kecamatan()
{
    return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'kecamatan_id');
}

public function kelurahan()
{
    return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'kelurahan_id');
}


    public function puskesmas()
    {
        return $this->belongsTo(MasterPuskesmas::class, 'puskesmas_id', 'id');
    }

}
