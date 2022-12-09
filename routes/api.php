<?php

use App\Http\Controllers\Frontend\AccController;
use App\Http\Controllers\Frontend\ChargeController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/clear-cache', [App\Http\Controllers\Api\CacheController::class, 'clearCache']);

Route::get('/ip', [App\Http\Controllers\Api\IPController::class, 'getIp']);

Route::get('/git-pull', [App\Http\Controllers\Api\GitPullController::class, 'getGitPull']);


