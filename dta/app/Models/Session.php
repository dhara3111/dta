<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    const  ACTIVE = 1, IN_ACTIVE = 0;

    protected $fillable = [
        'user_id',
        'session_id',
        'object',
        'billing_address_collection',
        'cancel_url',
        'client_reference_id',
        'customer',
        'customer_email',
        'display_items',
        'livemode',
        'locale',
        'mode',
        'payment_intent',
        'payment_method_types',
        'setup_intent',
        'submit_type',
        'subscription',
        'success_url',
    ];
}
