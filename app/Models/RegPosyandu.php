<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegPosyandu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'rw',
        'kecamatan_id',
        'kelurahan_id',
        'alamat_lengkap',
        'user_id',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
