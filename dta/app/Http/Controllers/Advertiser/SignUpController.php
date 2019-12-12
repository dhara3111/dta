<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Advertiser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpseclib\Crypt\Hash;

class SignUpController extends Controller
{
    /*----------------------------------------------------------------------------------
             This method use for display sign up Form
     ------------------------------------------------------------------------------------*/

    public function index(){

        return view('advertiser.signUp.index');
    }


    /*----------------------------------------------------------------------------------
             This method use for sign up store Form
     ------------------------------------------------------------------------------------*/

    public function store(Request $request){

//        dd($request->all());

//        $this->validate($request, [
//            'first_name' => 'required',
//            'last_name' => 'required',
//            'email' => 'required|email|unique:users,email',
//            'phone' => 'required',
//            'title' => 'required',
//
//            'company_name' => 'required',
//            'company_website' => 'required',
//            'address' => 'required',
//            'address2' => 'required',
//            'city' => 'required',
//            'state' => 'required',
//            'country' => 'required',
//            'zipcode' => 'required',
//        ]);

        $full_name=$request->first_name.' '.$request->last_name;

        $userModel = new User();
        $user = $userModel->create([
            'name' => ucwords($full_name),
            'email' => $request->get('email'),
            'phone' => $request->phone,
            'title' => $request->title,
            'password' => bcrypt($request->password),
            'type' => User::Advertiser,
            'profile' => 'advertiser',
            'status' => User::ACTIVE
        ]);

        $advertiserModel = new Advertiser();
        $advertiser = $advertiserModel->create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_website' => $request->company_website,
            'address' => $request->address,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'status' => Advertiser::ACTIVE
        ]);

        return view('advertiser.login.index')->with('success','Advertiser Successfully Created');
    }
}
