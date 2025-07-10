<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heroes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'image',
        'icon',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
