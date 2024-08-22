<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInstrumenKes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'instrumen',
       
    ];

    protected $casts = [
        'instrumen' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
