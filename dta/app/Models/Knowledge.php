<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    CONST ACTIVE=1,IN_ACTIVE=0;

    protected $fillable=[
        'topic_name',
        'description',
        'status',
    ];
}
