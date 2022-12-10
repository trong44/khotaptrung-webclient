<?php


namespace App\Library;

use function PHPUnit\Framework\isInstanceOf;
use function PHPUnit\Framework\matches;

class CategoryListOption
{

    public static function service()
    {
       $arr = null;

        if (setting('sys_service_widget_one') != ''){
            $arr = setting('sys_service_widget_one');
        }

        if (setting('sys_service_widget_two') != ''){
            if (isset($arr)){
                $arr = $arr.'|'.setting('sys_service_widget_two');
            }else{
                $arr = setting('sys_service_widget_two');
            }
        }
        if (setting('sys_service_widget_three') != ''){
            if (isset($arr)){
                $arr = $arr.'|'.setting('sys_service_widget_three');
            }else{
                $arr = setting('sys_service_widget_three');
            }
        }

        return $arr;
    }

    public static function nick()
    {
        $arr = null;

        if (setting('sys_nick_widget_one') != ''){
            $arr = setting('sys_nick_widget_one');
        }

        if (setting('sys_nick_widget_two') != ''){
            if (isset($arr)){
                $arr = $arr.'|'.setting('sys_nick_widget_two');
            }else{
                $arr = setting('sys_nick_widget_two');
            }
        }
        if (setting('sys_nick_widget_three') != ''){
            if (isset($arr)){
                $arr = $arr.'|'.setting('sys_nick_widget_three');
            }else{
                $arr = setting('sys_nick_widget_three');
            }
        }

        return $arr;
    }
}
