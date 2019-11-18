<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){

        return view('frontend.register.index');
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'street' => 'required',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'expertize_in' => 'required',
            'service_in_city' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'First name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid Email Address.',
            'email.unique' => 'This Email has already been taken',
            'phone.required' => 'Phone Number is required.',
            'phone.regex' => 'Invalid Phone Number.',
            'phone.unique' => 'This Phone Number has already been taken',
            'street.required' => 'Street Name is required.',
            'area.required' => 'Area Name is required.',
            'city.required' => 'City is required.',
            'state.required' => 'State is required.',
            'country.required' => 'Country is required.',
            'zipcode.required' => 'Zipcode Number is required.',
            'expertize_in.required' => 'Expertize In is required.',
            'service_in_city.required' => 'Provided Services In City Number is required.',
            'password.required' => 'Password is required.',
        ]);

        $keystring = str_random(16);

        $userModel = new User();
        $user = $userModel->create([
            'name' => ucwords($request->name),
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'area' => $request->area,
            'city' => ucwords($request->city),
            'state' => ucwords($request->state),
            'country' => ucwords($request->country),
            'zipcode' => $request->zipcode,
            'expertize_in' => $request->expertize_in,
            'service_in_city' => $request->service_in_city,
            'password' => bcrypt($request->password),
            'keystring' => $keystring,
            'type' => 3,
            'profile' => 'frontend',
            'status' => User::ACTIVE
//            IN_ACTIVE
        ]);


        \Auth::login($user);
        return redirect(route('frontend.home.index'))->with(['success' => 'Successfully registered !']);
    }
}
