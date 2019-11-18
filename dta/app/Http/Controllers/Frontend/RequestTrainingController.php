<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RequestTraining;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestTrainingController extends Controller
{
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
              'day_1' => 'required',
              'best_time_1' => 'required',
              'day_2' => 'required',
              'best_time_2' => 'required',
              'day_3' => 'required',
              'best_time_3' => 'required',
              'topics' => 'required',

        ]);

        $requestTrainingModel = new RequestTraining();
        $requestTraining = $requestTrainingModel->create([
            'user_id' => $request->user_id,
            'day_1' => $request->day_1,
            'best_time_1' => $request->best_time_1,
            'day_2' => $request->day_2,
            'best_time_2' => $request->best_time_2,
            'day_3' => $request->day_3,
            'best_time_3' => $request->best_time_3,
            'topics' => $request->topics,
        ]);

        return redirect(route('frontend.home.index'))->with(['success' => 'Request To Training Successfully Send !']);
    }
}
