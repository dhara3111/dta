<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class FrontAuth
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
        $user = auth()->user();

        if(!$user)
        {
            return redirect(route('frontend.login.index'));
        }

        if($user->type == User::SuperAdmin){
            return redirect(route('admin.dashboard.index'));
        }

        return $next($request);
    }
}
