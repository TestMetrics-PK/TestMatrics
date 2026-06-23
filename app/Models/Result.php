<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id', 'score', 'total', 'percent', 'details'
    ];

    protected $casts = [
        'details' => 'array',
        'percent' => 'float',
    ];
}
