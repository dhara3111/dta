<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    CONST ACTIVE=1,INACTIVE=0;
    const STARTNUMBER = 800;

    protected $fillable=[
        'number',
        'customer_id',
        'total',
        'sgst_per',
        'sgst_count',
        'cgst_per',
        'cgst_count',
        'igst_per',
        'igst_count',
        'courier',
        'final_total',
        'discount_per',
        'discount_total',
        'grand_total',
        'paid_total',
        'remain_total',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('invoices.status',self::ACTIVE);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function sales(){
        return $this->hasMany(Sales::class);
    }


}
