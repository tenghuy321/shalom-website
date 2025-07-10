<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'order',
        'content_display',
        'full_title',
        'content',
        'icon',
        'image',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'full_title' => 'array',
        'content_display' => 'array',
    ];
}
