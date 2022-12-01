<?php
use App\Http\Controllers\Frontend\AccController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ChargeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\ServiceController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Library\DirectAPI;
use App\Library\AuthCustom;
use Illuminate\Support\Facades\Cache;
use \Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear-cache', function ()
{
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    Cache::flush();
    return response()->json([
        'status' => 1,
        'message' => 'Thành công!',

    ]);
});
Route::get('/session', function ()
{
    Session::flush();
    return redirect()->to('/');
});
Route::get('/switch-theme/{id}', [\App\Library\Theme::class , 'getTheme'])->name('getTheme');



Route::get('/405', function ()
{
    return view('errors.405');
});

Route::get('/406', function ()
{
    return view('errors.406');
});

    Route::group(array('middleware' => ['throttle:300,1','verify_shop']) , function (){
        Route::group(array('middleware' => ['theme']) , function (){
            Route::get('/top-charge', [\App\Http\Controllers\Frontend\HomeController::class , 'getTopCharge'])->name('getTopCharge');
            Route::group(['middleware' => ['cacheResponse: 2592000','tracking','tokenRemember']], function (){
                Route::group(['middleware' => ['intend']], function () {
                    Route::get('/', [HomeController::class , "index"])->name('homeIndex')->middleware('intend');

                    if(setting('sys_zip_shop') && setting('sys_zip_shop') != ''){
                        Route::get('/'. setting('sys_zip_shop') .'', [ArticleController::class , "getList"])->name('articleList');

                        Route::get('/'. setting('sys_zip_shop') .'/{slug}', [ArticleController::class , "getDetail"])->name('articleDetail');
                    }else{
                        Route::get('/tin-tuc', [ArticleController::class , "getList"])->name('articleList');

                        Route::get('/tin-tuc/{slug}', [ArticleController::class , "getDetail"])->name('articleDetail');
                    }

//
//                Route::get('/blog', [ArticleController::class , "getList"]);
//
//                Route::get('/blog/{slug}', [ArticleController::class , "getDetail"]);


                    Route::get('/dich-vu', [ServiceController::class, "getList"])->name('serviceList');
                    Route::get('/dich-vu/{slug}', [ServiceController::class, "getDetail"])->name('serviceDetail');
                    Route::get('/mua-acc', [AccController::class , "getCategory"])->name('accIndex');
                    Route::get('/minigame', [\App\Http\Controllers\Frontend\MinigameController::class , 'getCategory'])->name('getCategory');

                    Route::get('/mua-the', [\App\Http\Controllers\Frontend\StoreCardController::class , 'getStoreCard'])->name('getStoreCard');
                    Route::get('/mua-the-{card}-{value}',[\App\Http\Controllers\Frontend\StoreCardController::class,'showDetailCard'])->name('showDetailCard');
                    Route::get('/mua-the-{card}',[\App\Http\Controllers\Frontend\StoreCardController::class,'showListCard'])->name('showListCard');
                });
                Route::get('/show-bot', [ServiceController::class , "showBot"]);
                Route::get('/lich-su-tra-gop',function(){
                    return view('frontend.pages.account.logs-installment');
                });
                Route::group(['middleware' => ['intend']], function () {


                });
                Route::group(['middleware' => ['doNotCacheResponse']], function (){
                    Route::post('/ajax/user/account_info', [UserController::class , "getInfo"]);

                    Route::group(['middleware' => ['intend']], function (){
//                    Route::get('/mua-nick-random', [AccController::class , "getShowAccRandom"]);
                        Route::get('/mua-acc/{slug}', [AccController::class , "getList"])->name('accList');
                        Route::get('/acc/{slug}', [AccController::class , "getDetail"])->name('accDetail');
                    });

                    Route::get('/acc/{id}/databuy', [AccController::class , "getBuyAccount"]);
                    Route::get('/related-acc', [AccController::class , "getRelated"]);
                    Route::get('/watched-acc', [AccController::class , "getWatched"]);

                    Route::get('/ajax/mua-nick-random', [AccController::class , "getShowAccRandom"]);

                    Route::post('/lich-su-mua-account-{id}/showpass', [\App\Http\Controllers\Frontend\AccController::class , 'getShowpassNick'])->name('getShowpassNick');

//                Route::post('/lich-su-mua-acoount-{id}/showpass', [\App\Http\Controllers\Frontend\AccController::class , 'getShowpassNick'])->name('getShowpassNick');

                    Route::get('/acc/{slug}/showacc', [AccController::class , "getShowDetail"]);



                    Route::get('/profile', [UserController::class , "profileSidebar"])->name('profile');
                    // lấy nhà mạng mua thẻ
                    Route::get('/ajax/store-card/get-telecom', [\App\Http\Controllers\Frontend\StoreCardController::class , 'getTelecomStoreCard'])->name('getTelecomStoreCard');
                    Route::get('/lich-su-mua-the', [\App\Http\Controllers\Frontend\StoreCardController::class , 'getStoreCardHistory']);
                    // lấy mệnh giá trong mua thẻ

                    Route::get('/ajax/store-card/get-amount', [\App\Http\Controllers\Frontend\StoreCardController::class , 'getAmountStoreCard'])->name('getAmountStoreCard');
//                get api atm
                    Route::get('/ajax/transfer-code', [\App\Http\Controllers\Frontend\TranferController::class , 'getIdCode'])->name('getIdCode');
//                captcha
                    Route::get('/first-captcha', [ChargeController::class , 'myCaptcha']);
                    Route::get('/reload-captcha', [ChargeController::class , 'reloadCaptcha']);
                    Route::get('/reload-captcha2', [ChargeController::class , 'reloadCaptcha2']);
//                 ROUTE cần auth load dữ liệu không cache
                    Route::group(['middleware' => ['auth_custom']], function (){
//                    profile
                        Route::get('/profile-info', [\App\Http\Controllers\Frontend\UserController::class , 'profile'])->name('index');
                        Route::get('/thong-tin', [\App\Http\Controllers\Frontend\UserController::class , 'getThongTin'])->name('getThongTin');
                        Route::get('/the-cao-da-mua', [\App\Http\Controllers\Frontend\UserController::class , 'getLogsStore'])->name('getLogsStoreCard');
                        Route::get('/the-cao-da-mua-{id}', [\App\Http\Controllers\Frontend\UserController::class , 'getShowLogsStore'])->name('getShowLogsStore');
                        Route::get('/the-cao-da-mua/data', [\App\Http\Controllers\Frontend\UserController::class , 'getLogsStoreData'])->name('getLogsStoreData');
                        Route::get('/thong-tin', [\App\Http\Controllers\Frontend\UserController::class , 'info']);
                        Route::get('/nap-the', [\App\Http\Controllers\Frontend\ChargeController::class , 'getDepositAuto'])->name('getDepositAuto');
//                    lịch sử nạp thẻ
                        Route::get('/lich-su-nap-the', [\App\Http\Controllers\Frontend\ChargeController::class , 'getChargeDepositHistory'])->name('getChargeDepositHistory');
                        Route::get('/lich-su-nap-the-{id}', [\App\Http\Controllers\Frontend\ChargeController::class , 'getChargeDepositHistoryDetail'])->name('getChargeDepositHistoryDetail');

                        if (isset(theme('')->theme_key)){
                            if (theme('')->theme_key == "theme_1"||theme('')->theme_key == "theme_4" ||theme('')->theme_key == "theme_card_2" ||theme('')->theme_key == "theme_dup" ||theme('')->theme_key == "theme_6" ||theme('')->theme_key == "theme_card_1"){
                                /*Theme_1*/
                                Route::get('/lich-su-mua-account', [\App\Http\Controllers\Frontend\AccController::class , 'getLogs'])->name('getBuyAccountHistory');
                            }else {
                                /*Theme_3*/
                                Route::get('/lich-su-mua-account', [\App\Http\Controllers\Frontend\AccController::class ,  'getLogsCustom'])->name('nick-buyed');
                            }
                        }else{
                            Route::get('/lich-su-mua-account', [\App\Http\Controllers\Frontend\AccController::class , 'getLogs'])->name('getBuyAccountHistory');

                        }

                        Route::get('/lich-su-mua-account-{id}', [\App\Http\Controllers\Frontend\AccController::class , 'getLogsCustomDetails'])->name('getLogsCustomDetails');
                        Route::post('/ajax/{slug_category}/{id}/databuy', [AccController::class , "postBuyAccount"]);

                        Route::get('/lich-su-mua-account/get-first-pass', [\App\Http\Controllers\Frontend\AccController::class , 'getFirstPass'])->name('get-first-pass');
                        Route::get('/lich-su-mua-account/showpass', [\App\Http\Controllers\Frontend\AccController::class , 'getShowpass'])->name('getShowpass');
//                    dịch vụ
                        Route::get('/dich-vu-da-mua', [\App\Http\Controllers\Frontend\ServiceController::class , 'getLogs'])->name('getBuyServiceHistory');
                        Route::get('/dich-vu-da-mua-{id}', [\App\Http\Controllers\Frontend\ServiceController::class , 'getLogsDetail']);
                        Route::get('/inbox/send/{id}', [\App\Http\Controllers\Frontend\ServiceController::class , 'getInbox'])->name('getInbox');
                        Route::post('/inbox/send/{id}', [\App\Http\Controllers\Frontend\ServiceController::class , 'portInbox'])->name('portInbox');
                        Route::get('/destroyservice', [\App\Http\Controllers\Frontend\ServiceController::class , 'getDelete'])->name('getDeleteServiceData');
                        Route::get('/editservice', [\App\Http\Controllers\Frontend\ServiceController::class , 'getEdit'])->name('getEditServiceData');
                        Route::post('/dich-vu-da-mua-{id}/destroy',[\App\Http\Controllers\Frontend\ServiceController::class , 'postDestroy'])->name('postDestroy');
                        Route::post('/dich-vu-da-mua-{id}/edit',[\App\Http\Controllers\Frontend\ServiceController::class , 'postEdit'])->name('postEdit');
                        Route::post('/dich-vu/{id}/purchase',[\App\Http\Controllers\Frontend\ServiceController::class , 'postPurchase']);
//                    lịch sử giao dịch
                        Route::get('/lich-su-giao-dich-tich-hop', [\App\Http\Controllers\Frontend\UserController::class , 'getTransactionShopCard']);
                        Route::get('/lich-su-nap-the-tich-hop', [\App\Http\Controllers\Frontend\UserController::class , 'getChargeHistory']);
                        Route::get('/lich-su-nap-the-atm', [\App\Http\Controllers\Frontend\UserController::class , 'getChargeATMHistory']);
                        Route::get('/lich-su-mua-the-tich-hop', [\App\Http\Controllers\Frontend\UserController::class , 'getStoreHistory']);
                        Route::get('/lich-su-giao-dich', [\App\Http\Controllers\Frontend\UserController::class , 'getTran']);
                        Route::get('/lich-su-giao-dich-{id}',[\App\Http\Controllers\Frontend\UserController::class , 'getTranDetail']);
                        //Nạp thẻ Atm
                        Route::get('/recharge-atm', [\App\Http\Controllers\Frontend\TranferController::class , 'index']);
                        Route::get('/lich-su-atm-tu-dong', [\App\Http\Controllers\Frontend\TranferController::class , 'logs']);
                        Route::get('/lich-su-atm-tu-dong-{id}', [\App\Http\Controllers\Frontend\TranferController::class , 'logsDetail']);
                        Route::get('/changepassword', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'changePassword'])->name('changePassword');

                        Route::post('/post-deposit', [\App\Http\Controllers\Frontend\ChargeController::class , 'postDeposit'])->name('postDeposit');
                    });
                    Route::get('/transfer/data', [\App\Http\Controllers\Frontend\TranferController::class , 'getHistoryTranfer']);
                    Route::get('/get-amount-card', [\App\Http\Controllers\Frontend\ChargeController::class , 'getAmountCharge'])->name('getAmountCharge');
                    Route::post('/changePasswordApi', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'changePasswordApi'])->name('changePasswordApi');

                    Route::get('/ajax/get-tele-card', [\App\Http\Controllers\Frontend\ChargeController::class , 'getTelecom']);
                    Route::get('/get-tele-card/data', [\App\Http\Controllers\Frontend\ChargeController::class , 'getDepositAutoData']);
                    Route::get('/ajax/get-amount-tele-card', [\App\Http\Controllers\Frontend\ChargeController::class , 'getTelecomDepositAuto']);
                    Route::post('/nap-the', [\App\Http\Controllers\Frontend\ChargeController::class , 'postTelecomDepositAuto'])->name('postTelecomDepositAuto');

                });
                // Route không cần Auth load dữ liệu không cache
                Route::group(['middleware' => ['doNotCacheResponse']], function (){

                    Route::get('/updategit-dev', function ()
                    {
                        $command='git pull https://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@github.com/tannm2611/khotaptrung-webclient.git dev 2>&1';
                        $output = shell_exec($command);
                        \Artisan::call('cache:clear');
                        return response()->json([
                            'status' => 1,
                            'message' => 'Thành công!',
                            'message-git' => $output,
                        ]);
                    });

                    Route::get('/updategit-master', function ()
                    {
                        $command='git pull https://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@github.com/tannm2611/khotaptrung-webclient.git master 2>&1';
                        $output = shell_exec($command);
                        \Artisan::call('cache:clear');
                        return response()->json([
                            'status' => 1,
                            'message' => 'Thành công!',
                            'message-git' => $output,
                        ]);
                    });

//                đăng nhập, đăng xuất, đăng ký
                    Route::post('/ajax/logout', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'logout'])->name('logout');
                    Route::get('/login', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'login'])->name('login');
                    Route::get('/user/access', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'accesUser']);
                    Route::post('/ajax/login', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'postLogin']);
//                Route::post('/loginApi', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'loginApi'])->name('loginApi');
                    Route::get('/loginfacebook', [\App\Http\Controllers\Frontend\Auth\LoginController::class , 'loginfacebook'])->name('loginfacebook');
                    Route::get('/register', [\App\Http\Controllers\Frontend\Auth\RegisterController::class , 'showFormRegister'])->name('register');
                    Route::post('/ajax/register', [\App\Http\Controllers\Frontend\Auth\RegisterController::class , 'register']);
//                site map
                    Route::get('/sitemap.xml', [\App\Http\Controllers\Frontend\SiteMapController::class , 'index']);
                    Route::get('/rss', [\App\Http\Controllers\Frontend\RssController::class , 'index']);
                    Route::get('/rss-detail', [\App\Http\Controllers\Frontend\RssController::class , 'detail']);

                    Route::get('/robots.txt', function ()
                    {
                        return view('frontend.pages.robots.robots.txt');
                    });

                    Route::get('/rss-minigame', function ()
                    {
                        return response()->view('frontend.pages.rss.minigame')->header('Content-Type', 'application/xml');
                    });
                    Route::get('/rss-article', function ()
                    {
                        return response()->view('frontend.pages.rss.article')->header('Content-Type', 'application/xml');
                    });
                    Route::get('/rss-service', function ()
                    {
                        return response()->view('frontend.pages.rss.service')->header('Content-Type', 'application/xml');
                    });
                    Route::get('/rss-nick', function ()
                    {
                        return response()->view('frontend.pages.rss.nick')->header('Content-Type', 'application/xml');
                    });

//                404
                    Route::get('/404', function ()
                    {
                        return view('frontend.pages.404')->name('404');
                    });
                    Route::get('/clear', function ()
                    {
                        \Artisan::call('cache:clear');
                        \Artisan::call('config:cache');
                        \Artisan::call('view:clear');
                        \Artisan::call('route:clear');
                        Cache::flush();
                        return response()->json([
                            'status' => 1,
                            'message' => 'Thành công!'
                        ]);
                    });

                });

                //minigame
                Route::group(['middleware' => ['doNotCacheResponse']], function (){

                    Route::post('/minigame-play', [\App\Http\Controllers\Frontend\MinigameController::class , 'postRoll'])->name('postRoll');
                    Route::post('/minigame-bonus', [\App\Http\Controllers\Frontend\MinigameController::class , 'postBonus'])->name('postBonus');
                    Route::get('/minigame-log', [\App\Http\Controllers\Frontend\MinigameController::class , 'getLog'])->name('getLog');
                    Route::get('/minigame-logacc', [\App\Http\Controllers\Frontend\MinigameController::class , 'getLogAcc'])->name('getLogAcc');
//                Route::get('/trong-test',[\App\Http\Controllers\Frontend\MinigameController::class,'getIndexUpdate']);
                    Route::get('/withdrawitem-{game_type}', [\App\Http\Controllers\Frontend\MinigameController::class , 'getWithdrawItem'])->name('getWithdrawItem');
                    Route::post('/withdrawitem-{game_type}', [\App\Http\Controllers\Frontend\MinigameController::class , 'postWithdrawItem'])->name('postWithdrawItem');
                    Route::post('/withdrawitemajax-{game_type}', [\App\Http\Controllers\Frontend\MinigameController::class , 'postWithdrawItemAjax'])->name('postWithdrawItemAjax');

                    Route::get('/withdrawitemajax-{game_type}', [\App\Http\Controllers\Frontend\MinigameController::class , 'getWithdrawItemAjax'])->name('getWithdrawItemAjax');
                    Route::post('/postwithdrawitemajax-{game_type}',[\App\Http\Controllers\Frontend\MinigameController::class,'sendWithDrawItem']);

                    Route::get('/ajax-modal-logs-spin-bonus',[\App\Http\Controllers\Frontend\MinigameController::class,'getLogsModalSpinBonus']);
                    Route::get('/ajax-modal-logs-spin-bonus-acc',[\App\Http\Controllers\Frontend\MinigameController::class,'getLogsModalSpinBonus']);

                    Route::post('/bonus', [\App\Http\Controllers\Frontend\MinigameController::class , 'postBonusLogin'])->name('postBonusLogin');
                    Route::get('/bonus', [\App\Http\Controllers\Frontend\MinigameController::class , 'getBonusLogin'])->name('getBonusLogin');

                    Route::group(['middleware' => ['intend']], function () {

                        Route::get('/minigame-{slug}', [\App\Http\Controllers\Frontend\MinigameController::class , 'getIndex'])->name('getIndex');

                    });
                    Route::get('/service-mobile', function ()
                    {
                        return view('frontend.layouts.includes.list-mobile');
                    })->name('getListMobile');

                    Route::get('/garena/{slug}', [\App\Http\Controllers\Frontend\RedirectUrl::class , 'redirectUrlGarena']);
                    Route::get('/danh-muc/{slug}', [\App\Http\Controllers\Frontend\RedirectUrl::class , 'redirectUrlDanhmuc']);
//                Shop rikaki
                    Route::get('/free-fire-gia-re', [\App\Http\Controllers\Frontend\RedirectUrl::class , 'redirectUrlRikaki']);
                    Route::get('/nick-free-fire-sieu-re', [\App\Http\Controllers\Frontend\RedirectUrl::class , 'redirectUrlRikaki']);
                    Route::get('/nick-free-fire-sieu-cap', [\App\Http\Controllers\Frontend\RedirectUrl::class , 'redirectUrlRikaki']);
                    Route::get('/free-fire-tam-trung', [\App\Http\Controllers\Frontend\RedirectUrl::class , 'redirectUrlRikaki']);
                    Route::get('/game-acc-free-fire', [\App\Http\Controllers\Frontend\RedirectUrl::class , 'redirectUrlNickFreeGireGiare']);
                });
            });

            Route::post('/ajax/mua-the', [\App\Http\Controllers\Frontend\StoreCardController::class , 'postStoreCard'])->name('postStoreCard');
        });


    });







