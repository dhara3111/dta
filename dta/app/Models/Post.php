<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    CONST ACTIVE=1,IN_ACTIVE=0;
    CONST Visited=1,Not_Visited=0;

    protected $fillable=[
        'lead_id',
        'lead_code',
        'from_id',
        'to_id',
        'lead_cpl',
        'visited',
        'status',
    ];
}
