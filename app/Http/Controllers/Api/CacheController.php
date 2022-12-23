<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\ResponseCache\Facades\ResponseCache;

class CacheController extends Controller
{
    public function clearCache(Request $request){
        if (config('api.config_backup') === true && Cache::has('verify_shop')) {
            $very_shop = Cache::get('verify_shop');
            $secret_key = $very_shop->response_data->secret_key??null;
        } elseif (config('api.config_backup') === true) {
            return response()->json([
                'status' => 1,
                'message' => 'Thành công!'
            ]);
        } else {
            $secret_key = config('api.secret_key');
        }

        $sign = $request->secret_key;
        if ($secret_key != $sign){
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền truy cập!'
            ]);
        }
        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
        \Artisan::call('optimize:clear');
        Cache::flush();
        return response()->json([
            'status' => 1,
            'message' => 'Thành công!'
        ]);
    }


}
