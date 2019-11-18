<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurDetail extends Model
{
    const ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable=[
        'image',
        'favicon',
        'address',
        'mobile',
        'email',
        'website',
        'status',
    ];
}
