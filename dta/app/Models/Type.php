<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    CONST ACTIVE=1,IN_ACTIVE=0;

    protected $fillable=[
        'name',
        'key',
        'campaign_id',
        'campaign_key',
    ];
}
