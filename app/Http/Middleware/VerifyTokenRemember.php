<?php

namespace App\Http\Middleware;

use App\Library\DirectAPI;
use Carbon\Carbon;
use Closure;
use Cookie;
use Illuminate\Http\Request;
use Session;

class VerifyTokenRemember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
