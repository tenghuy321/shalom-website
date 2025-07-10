<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'order',
        'date',
        'content',
        'our_logo',
        'partner_logo',
        'image',
    ];

    protected $casts = [
        'title' => 'array',
        'date' => 'array',
        'content' => 'array',
    ];
}
