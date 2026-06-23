<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'body', 'options', 'answer', 'explanation', 'difficulty', 'type'
    ];

    protected $casts = [
        'options' => 'array'
    ];
}
