<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'order',
        'question',
        'answer',
    ];

    protected $casts = [
        'question' => 'array',
        'answer' => 'array',
    ];
}
