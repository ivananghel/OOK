<?php

namespace App\Helpers;

use App\Exceptions\AuthenticationException;
use App\Exceptions\PermissionException;
use Illuminate\Support\Facades\Auth;

final class Permission extends Helper {

    public static function check($permission){
        $user = Auth::user();
        if(null == $user){
            throw new AuthenticationException('You are not logged in');
        }
        if(false === $user->can($permission)){
            throw new PermissionException('You don\'t have enough permissions');
        }
        return true;
    }

}