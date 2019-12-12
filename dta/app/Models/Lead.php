<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'lp_campaign_id',
        'lp_campaign_key',
        'lp_test',
        'lp_response',
        'leadID',
        'first_name',
        'last_name',
        'phone_home',
        'city',
        'state',
        'zip_code',
        'email_address',
        'ip_address',
        'type_id',
        'valid',
        'comments',
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
        'status',
    ];

}
