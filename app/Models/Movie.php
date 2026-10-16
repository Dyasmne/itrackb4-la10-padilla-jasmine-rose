<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
     protected $fillable = [
        'title',
        'genre',
        'rating',
        'is_available',
        'release_year',
    ];

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'release_year' => 'integer',
        ];
    }
}
