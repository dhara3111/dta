<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){

        $user = auth()->user();

        return view('frontend.profile.index',[
            'user'=>$user,
        ]);
    }

    public function edit(){

        $user = auth()->user();

        return view('frontend.profile.edit',[
            'user'=>$user,
        ]);
    }

    public function update($id,Request $request)
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

        $user = User::find(auth()->user()->id);

        if(empty($user)){
            return redirect()->route('frontend.profile.index')->with('error','Invalid ID');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->street = $request->street;
        $user->area = $request->area;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->zipcode = $request->zipcode;
        $user->expertize_in = $request->expertize_in;
        $user->service_in_city = $request->service_in_city;
        $user->keystring = $keystring;

        $user->save();


//        $uploadPath= public_path()."/userImages";
//        $image = $request->image;
//
//
//        if ($request->hasFile('image')){
//            $tmpFileName = Carbon::now()->format('YHisdmu') . '-' . $image->getClientOriginalName();
//            $file = $image->move($uploadPath, $tmpFileName);
//
//            $user->image = $tmpFileName;
//
//            $user->save();
//        }

        return redirect()->route('frontend.profile.index')->with('success','Your Profile Updated Successfully');

    }
}
