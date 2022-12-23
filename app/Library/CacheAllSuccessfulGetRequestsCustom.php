<?php
namespace App\Library;
use Spatie\ResponseCache\CacheProfiles\CacheAllSuccessfulGetRequests;
use Spatie\ResponseCache\CacheProfiles\BaseCacheProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use App\Library\AuthCustom;

class CacheAllSuccessfulGetRequestsCustom extends BaseCacheProfile {

    protected string $name_middleware_auth_custom = 'auth_custom';

    public function __construct(Request $request)
    {
        if($request->method() === "GET"){
            $middleware = $request->route()->action['middleware'];
            if(isset($middleware) && count($middleware) > 0){
                $middleware_auth_custom = false;
                foreach($middleware as $key => $item){
                    if($item === $this->name_middleware_auth_custom){
                        $middleware_auth_custom = true;
                        break;
                    }
                    continue;
                }
                if($middleware_auth_custom == true){
                    if(!AuthCustom::check()){
                        if($request->ajax()){
                            return response()->json([
                                'status' => 401,
                                'message'=>"unauthencation"
                            ]);
                        }
                        else{
                            return redirect('login');
                        }
                    }
                }
            }
        }
    }
    public function useCacheNameSuffix(Request $request) : string
    {
        return AuthCustom::user()
            ? (string) AuthCustom::user()->id
            : '';

//
//        return AuthCustom::user()
//        ? (string) AuthCustom::user()->id
//        : '';
    }
    public function shouldCacheRequest(Request $request): bool
    {
        if ($request->ajax()) {
            return false;
        }

        if ($this->isRunningInConsole()) {
            return false;
        }

        return $request->isMethod('get');
    }

    public function shouldCacheResponse(Response $response): bool
    {
        if (! $this->hasCacheableResponseCode($response)) {
            return false;
        }

        if (! $this->hasCacheableContentType($response)) {
            return false;
        }

        return true;
    }

    public function hasCacheableResponseCode(Response $response): bool
    {
        if ($response->isSuccessful()) {
            return true;
        }

        if ($response->isRedirection()) {
            return true;
        }

        return false;
    }

    public function hasCacheableContentType(Response $response): bool
    {
        $contentType = $response->headers->get('Content-Type', '');

        if (Str::startsWith($contentType, 'text/')) {
            return true;
        }

        if (Str::contains($contentType, ['/json', '+json'])) {
            return true;
        }

        return false;
    }
}
