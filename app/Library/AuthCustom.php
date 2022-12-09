<?php

namespace App\Library;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class AuthCustom{
    public static function check(){
        if(session()->has('auth_custom')){
            return true;
        }
        return false;
    }
    public static function user(){
        if(session()->has('auth_custom')){
            return session()->get('auth_custom');
        }
        return null;
    }
    public static function getName(){
        if(session()->has('auth_custom')){
            $user = session()->get('auth_custom');
            return $user->fullname??$user->username;
        }
        return null;
    }
//    public static function check(){
//        if(session()->has('jwt')){
//            return true;
//        }
//        return false;
//    }
//    public static function user(){
//        if(session()->has('jwt')){
//            return session()->get('jwt');
//        }
//        return null;
//    }
}
