<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeralatanKes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'peralatan',
       
    ];

    protected $casts = [
        'peralatan' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
