<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AdminAuth
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
            return redirect(route('admin.login.index'));
        }
//
//        if($user->type == User::OWNER || $user->type == User::AGENT || $user->type == User::BUILDER)
//        {
//            return redirect(route('frontend.profile.index'));
//        }

        return $next($request);

    }
}
