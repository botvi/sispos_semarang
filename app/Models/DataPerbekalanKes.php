<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerbekalanKes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'perbekalan',
       
    ];

    protected $casts = [
        'perbekalan' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
