<?php

namespace App;

use App\Models\Admin_User;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Notification;
use App\Models\Role;
use App\Models\TestNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{

//    use EntrustUserTrait { restore as private restoreA; }
    use SoftDeletes { restore as private restoreB; }
    use Notifiable;

    const UNSET = 0,  SET = 1;
    const  ACTIVE = 1, IN_ACTIVE = 0;
    const  Developer = 0, SuperAdmin = 1, Admin = 2, Attorney = 3;


    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'street',
        'area',
        'city',
        'state',
        'country',
        'zipcode',
        'expertize_in',
        'service_in__city',
        'password',
        'keystring',
        'api_secret',
        'api_key',
        'type',
        'reset_password_token',
        'reset_password_sent_at',
        'unlock_token',
        'status',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('users.status',self::ACTIVE);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function adminUser()
    {
        return $this->hasOne(Admin_User::class);
    }


    public function role(){
        return $this->hasMany(Role::class);
    }

    public function deferAndAttachNewRole($role) {
        // remove any roles tagged in this user.
        foreach ($this->roles as $userRole) {
            $this->roles()->detach($userRole->id);
        }

        // attach the new role using the `EntrustUserTrait` `attachRole()`
        $this->attachRole($role);

    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

}
