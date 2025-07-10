<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'order',
        'content',
        'image',
    ];
    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'image' => 'array',
    ];
}
