<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;
    const  Refund = 1, Not_Refund = 0;

    protected $fillable = [
        'user_id',
        'session_id',
        'payment_intent',
        'charge_id',
        'customer_id',
        'lead_id',
        'total_lead',
        'total_amount_of_lead',
        'reason',
        'description',
        'refund',
        'status',

    ];
}
