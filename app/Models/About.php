<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'icon',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
