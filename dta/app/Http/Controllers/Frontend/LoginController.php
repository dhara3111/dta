<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    /*----------------------------------------------------------------------------------
            This method use for display Login frontend page
    ------------------------------------------------------------------------------------*/

    public function index(){

        return view('frontend.login.index');
    }

    /*----------------------------------------------------------------------------------
            This method use for login in frontend
    ------------------------------------------------------------------------------------*/

    public function doLogin(Request $request)
    {
//        dd($request->all());
//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required'
//        ]);

        if($user = User::where('email',$request->get('email'))->active()->first())
        {
            if(Hash::check($request->get('password'),$user->password) && ($user->type == 3))
            {

                \Auth::login($user);
                return redirect(route('frontend.home.index'));
            }
        }
        return redirect(route('frontend.login.index'))->with(['error' => 'Invalid credential please try again !']);
    }

    /*----------------------------------------------------------------------------------
            This method use for logout in frontend
    ------------------------------------------------------------------------------------*/

    public function logout(Request $request)
    {
//        dd(auth()->user());
//        if (auth()->user()->profile == "frontend"){

            \Auth::logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect(route('frontend.home.index'));
//        }
    }

}
