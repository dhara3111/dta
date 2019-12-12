<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{

    /*----------------------------------------------------------------------------------
             This method use for display Reset Password Form
     ------------------------------------------------------------------------------------*/
    public function index($key, $id){

        // decrypt and get params from hash
        $token = decrypt($key);
        $userId = $id;

        $user = User::where('reset_password_token',$token)->where('id',$userId)->first();

        if ($user) {

//            $date     = new \DateTime($user->reset_password_sent_at);
//            $now      = new \DateTime();
//            $interval = $now->diff($date)->format('%i'); // i = minute
//
//            // Check for Time difference
//            // here 60 = 60 minute
//            if($interval < 60 && $user->unlock_token == User::SET)
//            {
                return view('admin.resetPassword.index',[
                    'key' => $key,
                    'id' => $id,

                ]);
//            }
//            else
//            {
//                // Redirect forgot password page with error message
//                return redirect(route('admin.forget.index'))->with('error','This link is no longer available');
//            }

        } else {

            // Redirect forgot password page with error message
            return redirect(route('admin.forget.index'))->with('error','This link is no longer available');

        }

    }

    /*----------------------------------------------------------------------------------
             This method use for Reset the Password and Store in Database
     ------------------------------------------------------------------------------------*/
    public function reset($key, $id, Request $request){
        $this->validate($request, [
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $token = decrypt($key);
        $userId = $id;

        $user = User::where('reset_password_token',$token)->where('id',$userId)->first();

        if ($user) {

//            $date     = new \DateTime($user->reset_password_sent_at);
//            $now      = new \DateTime();
//            $interval = $now->diff($date)->format('%i'); // i = minute
//
//            // Check for Time difference
//            // here 60 = 60 minute
//            if($interval < 60 && $user->unlock_token == User::SET)
//            {
                // Update new password in database
                $user->reset_password_token = $token;
//                $user->password = bcrypt($request->password);
                $user->password = Hash::make($request->password);
                $user->unlock_token = User::UNSET;
                $user->status = User::ACTIVE;
                $user->save();
                return redirect(route('admin.login.index'))->with('success','New password set successfully');

//            }
//            else
//            {
//                // Redirect forgot password page with error message
//                return redirect(route('admin.forget.index'))->with('error','This link is no longer available');
//            }

        } else {

            // Redirect forgot password page with error message
            return redirect(route('admin.forget.index'))->with('error','This link is no longer available');

        }

    }


}
