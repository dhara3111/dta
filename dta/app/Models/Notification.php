<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    const  READ = 1, UN_READ = 0;
    const DASHBOARD_RALETED = 1000;

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'status_code',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function scopeRead($query)
    {
        return $query->where('notifications.status',self::READ);
    }

    public function scopeUnRead($query)
    {
        return $query->where('notifications.status',self::UN_READ);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
