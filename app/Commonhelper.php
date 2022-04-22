<?php

namespace App;

use Illuminate\Support\Facades\Redis;
use App\Models\User;

class Commonhelper
{
    public static function active($path, $active = 'active') {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }

    public static function getCache($key){
        if(!Redis::get($key))
        {
            self::setCache('users');
        }
        return json_decode(Redis::get($key));
    }

    public static function setCache($key){
        return Redis::set($key,User::where('is_active',1)->get());
    }
}
