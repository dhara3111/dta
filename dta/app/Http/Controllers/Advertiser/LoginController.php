<?php

namespace App\Http\Controllers\Advertiser;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*----------------------------------------------------------------------------------
             This method use for display Login Form
     ------------------------------------------------------------------------------------*/
    public function index(){
        if(Auth::user()){
            if((Auth::user()->type == User::Advertiser)){
                return redirect(route('advertiser.dashboard.index'));
            }

        }
        return view('advertiser.login.index');
    }

    /*----------------------------------------------------------------------------------
             This method use for Sign in Login Form
     ------------------------------------------------------------------------------------*/
    public function sign(Request $request)
    {
//        dd($request->all());
//        $this->validate($request,[
//            'email'=>'required|email',
//            'password'=>'required'
//        ]);
        $types=array('4');
        if($user = User::where('email',$request->get('email'))->whereStatus(User::ACTIVE)->whereIn('type',$types)->first())
        {
            if(Hash::check($request->get('password'),$user->password))
            {
                \Auth::login($user);
                return redirect(route('advertiser.dashboard.index'));
            }
        }

        return redirect(route('advertiser.login.index'))->with(['error' => 'Invalid credential try again !']);

    }

    /*----------------------------------------------------------------------------------
             This method use for Logout the User
     ------------------------------------------------------------------------------------*/
    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect(route('advertiser.login.index'));
    }
}
