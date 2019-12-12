<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SendReminderEmail;
use App\Models\Attorney;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Lead;
use App\Models\Notification;
use App\models\Purchase;
use App\Models\TestNotification;
use App\Models\Vendor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /*----------------------------------------------------------------------------------
            This method use for display Dashboard Form
    ------------------------------------------------------------------------------------*/
    public function index(){

        $leads=Lead::all();
        $attorneys=User::whereType('3')->whereStatus(1)->get();
        $subAdmins=User::whereType('1')->whereStatus(1)->get();

        return view('admin.dashboard.index',[
            'leads'=>$leads,
            'attorneys'=>$attorneys,
            'subAdmins'=>$subAdmins,
        ]);
    }

    public function check(){
        if(Auth::user()->id != 6) {

            $testNotificationModel = new Notification();
            $noti = $testNotificationModel->create([
                'user_id' => 6,
                'title' => "Received the new notification from: ".Auth::user()->name,
                'message' => Carbon::now(),
                'status_code' => Notification::DASHBOARD_RALETED,
                'status' => Notification::UN_READ
            ]);

        }
        return redirect(route('admin.dashboard.index'))->with('socket',$noti->user_id);
    }

    public function checkNotification(Request $request){

        $notification = Notification::whereUserId($request->id)->orderBy('id','desc')->first();

        return[
          'id' => $notification->id,
          'title' => $notification->title,
          'msg' => $notification->message,
          'status_code' => $notification->status_code,
          'time' => Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans(),
        ];
    }
}
