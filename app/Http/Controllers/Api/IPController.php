<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;


class IPController extends Controller
{
    public function getIp(Request $request){


        $ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, "http://ipecho.net/plain");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // grab URL and pass it to the browser
        $ip = curl_exec($ch);
        curl_close($ch);

        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
        Cache::flush();

        return response()->json([
            'status' => 1,
            'message' => 'Thành công!',
            'ip' => $ip
        ]);

    }

}
