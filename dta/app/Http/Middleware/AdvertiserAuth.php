<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdvertiserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $advertiser = auth()->User()->type == User::Advertiser;

        if(!$advertiser)
        {
            return redirect(route('advertiser.login.index'));
        }
        return $next($request);
    }
}
