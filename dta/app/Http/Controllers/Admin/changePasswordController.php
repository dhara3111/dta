<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class changePasswordController extends Controller
{
    public function index(){

        $user = auth()->user();

        return view('admin.changePassword.index',[
            'user'=>$user,
        ]);
    }

    public function edit($id,Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);
        $user = User::find(auth()->user()->id);
        if(!Hash::check($request->get('current_password'), $user->password)) {
            return redirect(route('admin.changePassword.index'))->with(['error' => 'The current password does not match !']);
        }
        $user->password = bcrypt($request->get('confirm_password'));
        $user->save();
        return redirect(route('admin.dashboard.index'))->with(['success' => 'Password Changed Successfully']);
    }
}
