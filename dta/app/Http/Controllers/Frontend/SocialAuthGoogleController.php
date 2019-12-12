<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite\Facades\Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        try {


            $googleUser = Socialite\Facades\Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();


            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $user = new User;
                $user->first_name = $googleUser->name;
                $user->email = $googleUser->email;
//                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect(route('frontend.home.index'))->with('success','Login Successfully');
        }
        catch (\Exception $e) {
            dd($e);
            return 'error';
        }
    }
}
