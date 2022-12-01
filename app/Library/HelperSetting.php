<?php


use App\Library\Setting;
use App\Library\Theme;
use App\Library\Helpers;


if (! function_exists('theme')) {

    function theme($key, $default = null)
    {
        if (is_null($key)) {
            return \App\Library\Theme::getAllTheme();
        }
        if (is_array($key)) {

        }
        $value = \App\Library\Theme::getTheme($key);
        return is_null($value) ? value($default) : $value;
    }
}

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {

        if (is_null($key)) {

            return \App\Library\Setting::getAllSettings();
        }

        if (is_array($key)) {

        }
        $value = \App\Library\Setting::get($key);
        return is_null($value) ? value($default) : $value;
    }
}

if (! function_exists('widget')) {

    function widget($view_name, $time_cache=null)
    {
        if($time_cache==null){
            return $viewRender = Cache::rememberForever('cache_'.$view_name, function () use($view_name){
                return $aCache =  view($view_name)->render();
            });
        }
        else{
            return $viewRender = Cache::remember('cache_'.$view_name, $time_cache, function () use($view_name){
                return $aCache =  view($view_name)->render();
            });
        }
    }
}

if (! function_exists('formatPrice')) {

    function formatPrice($price)
    {
        return Helpers::formatPrice($price);
    }
}

if (! function_exists('formatDateTime')) {

    function formatDateTime($date)
    {
        return Helpers::formatDateTime($date);
    }
}

if (! function_exists('encodeItemID')) {

    function encodeItemID($id)
    {
        return Helpers::encodeItemID($id);
    }
}

if (! function_exists('decodeItemID')) {

    function decodeItemID($str)
    {
        return Helpers::decodeItemID($str);
    }
}

if (! function_exists('dateTimeBlog')) {

    function dateTimeBlog($str)
    {
        return Helpers::dateTimeBlog($str);
    }
}
