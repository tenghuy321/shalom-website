<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'icon',
        'email',
        'phone_number',
        'hours_of_operation',
        'address',
        'facebook_link',
        'ig_link',
        'tiktok_link',
        'telegram_link',
        'linkedin_link',
    ];

    protected $casts = [
        'hours_of_operation' => 'array',
        'address' => 'array',
    ];
}
