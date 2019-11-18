<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'leadID',
        'first_name',
        'last_name',
        'phone_home',
        'affiliate_name',
        'campaign_name',
        'sellable',
        'sold',
        'paid',
        'scrubbed',
        'trash',
        'isTest',
        'CPL',
        'RPL',
        'lp_post_response',
        'created_on_date',
    ];

}
