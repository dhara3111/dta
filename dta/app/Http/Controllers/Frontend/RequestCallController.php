<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RequestCall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestCallController extends Controller
{
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'phone' => 'required',
            'time_to_call' => 'required',
            'request_info' => 'required',

        ], [
            'phone.required' => 'Contact number is required.',
            'time_to_call.required' => 'Best time to call you is required.',
            'request_info.email' => 'Call request information is required.',
        ]);

        $requestCallModel = new RequestCall();
        $requestCall = $requestCallModel->create([
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'time_to_call' => $request->time_to_call,
            'request_info' => $request->request_info,
        ]);

        return redirect(route('frontend.home.index'))->with(['success' => 'Request To Call Back Successfully Send !']);
    }
}
