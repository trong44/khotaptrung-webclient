<?php



namespace App\Library;
use Carbon\Carbon;
use App\Library\DirectAPI;
use Illuminate\Support\Facades\Cache;

class Setting{
    public static function get($key){
        if ( isset($key) ) {
            $setting = self::getAllSettings();

            $setting_get_key = null;
            if (isset($setting) && count($setting)){
                foreach ($setting as $item){
                    if(isset($item->name) && $item->name === $key){
                        $setting_get_key = $item;
                        break;
                    }
                    continue;
                }
            }

            if(empty($setting_get_key)){
                return null;
            }
            return self::castValue($setting_get_key->val, $setting_get_key->type);
        }
        return self::getAllSettings();
    }
    public static function getAllSettings(){
//        dd(111);
        if (Cache::has('settings.all')) {
            return Cache::get('settings.all');
        }
        return self::api();
    }
    private static function castValue($val, $castTo)
    {
        switch ($castTo) {
            case 'int':
            case 'integer':
                return intval($val);
                break;

            case 'bool':
            case 'boolean':
                return boolval($val);
                break;

            default:
                return $val;
        }
    }

    public static function api(){
        $url = '/system/setting';
        $method = "GET";
        $data = array();
        $result = DirectAPI::_makeRequest($url ,$data ,$method);
        if(isset($result) && $result->response_code == 200){
            $seo = $result->response_data->data??null;
            return Cache::rememberForever('settings.all', function() use ($seo) {
                return $seo;
            });
        }

        return Cache::get('settings.all');
    }


}
