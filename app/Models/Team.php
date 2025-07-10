<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'order',
        'position',
        'content',
        'link',
        'image',
    ];

    protected $casts = [
        'name' => 'array',
        'position' => 'array',
        'content' => 'array',
    ];
}
