<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\RequestTraining;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestTrainingController extends Controller
{
    public function index($userId,$module){

        $requestTrainings = RequestTraining::whereStatus(0)->get();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.requestTraining.index', [
            'requestTrainings' => $requestTrainings,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);


    }

    public function approve($userId,$module){

        $requestTrainings = RequestTraining::whereStatus(1)->get();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.requestTraining.approve', [
            'requestTrainings' => $requestTrainings,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);

    }

    /*----------------------------------------------------------------------------------
        This method use to Change RequestTraining Status in Database
    ------------------------------------------------------------------------------------*/
    public function changeStatus(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:users,id',
            'status_id' => 'required|in:0,1',
        ]);

        $requestTraining = RequestTraining::whereId($request->id)->first();

        try{
            if(!empty($requestTraining)){

                $requestTraining->status = $request->status_id;
                $requestTraining->save();

                $requestTrainingChange = RequestTraining::whereId($request->id)->first();
                $html = '';

                if($request->status_id == RequestTraining::APPROVE){
                    $html .='<span class="m-badge m-badge--success m-badge--wide statusChange" data-id="'.$requestTrainingChange->id.'" status-id="'.RequestTraining::UN_APPROVE.'" style="cursor: pointer">Approve</span>';

                }
                else{
                    $html .='<span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="'.$requestTrainingChange->id.'" status-id="'.RequestTraining::APPROVE.'" style="cursor: pointer">Pandding</span>';

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
