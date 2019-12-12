<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    CONST ACTIVE=1,IN_ACTIVE=0;

    protected $fillable=[
        'name',
        'description',
        'designation',
        'image',
        'status',
    ];
}
