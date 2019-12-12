<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\RequestCall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestCallController extends Controller
{

    public function index($userId,$module){

        $requestCalls = RequestCall::whereStatus(0)->get();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.requestCall.index', [
            'requestCalls' => $requestCalls,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);


    }

    public function approve($userId,$module){

        $requestCalls = RequestCall::whereStatus(1)->get();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.requestCall.approve', [
            'requestCalls' => $requestCalls,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);

    }

    /*----------------------------------------------------------------------------------
        This method use to Change RequestCall Status in Database
    ------------------------------------------------------------------------------------*/
    public function changeStatus(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:users,id',
            'status_id' => 'required|in:0,1',
        ]);

        $requestCall = RequestCall::whereId($request->id)->first();

        try{
            if(!empty($requestCall)){

                $requestCall->status = $request->status_id;
                $requestCall->save();

                $requestCallChange = RequestCall::whereId($request->id)->first();
                $html = '';

                if($request->status_id == RequestCall::APPROVE){
                    $html .='<span class="m-badge m-badge--success m-badge--wide statusChange" data-id="'.$requestCallChange->id.'" status-id="'.RequestCall::UN_APPROVE.'" style="cursor: pointer">Approve</span>';

                }
                else{
                    $html .='<span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="'.$requestCallChange->id.'" status-id="'.RequestCall::APPROVE.'" style="cursor: pointer">Pandding</span>';

                }
                return response()->json([
                    'status' => true,
                    'message' => "success",
                    'html' => $html,
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => "Something went wrong...",
            ]);
        }catch (\Exception $e){

        }
    }

}
