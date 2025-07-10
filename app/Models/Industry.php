<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table = 'industries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'order',
        'icon',
    ];
    protected $casts = [
        'title' => 'array',
    ];
}
