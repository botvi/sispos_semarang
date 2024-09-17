<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKordinatorKec extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'penanggung_jawab',
        'telepon_penanggung_jawab',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
