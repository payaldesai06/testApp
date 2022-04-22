<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Commonhelper;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'user_name','middle_name','email','password','region','dob','blood_group','favorite_animal','is_active','role_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot() {

        parent::boot();

        static::created(function() {
            Commonhelper::setCache('users');
        });

    }

}
