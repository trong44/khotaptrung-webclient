<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Illuminate\Http\Request;

class VerifyTracking
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

        if ($request->filled('utm_source')) {
            $utm_source = $request->utm_source;

            $minutes = 1440;

            Cookie::queue('utm_source',$utm_source,$minutes);
        }

        if ($request->filled('utm_campaign')) {
            $utm_campaign = $request->utm_campaign;
            $minutes = 1440;

            Cookie::queue('utm_campaign',$utm_campaign,$minutes);
        }

        return $next($request);
    }
}
