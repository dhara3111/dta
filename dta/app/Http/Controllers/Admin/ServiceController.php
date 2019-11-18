<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /*----------------------------------------------------------------------------------
            This method use for display List of
    ------------------------------------------------------------------------------------*/

    public function index(Request $request,$userId,$module){

//        if ($request->ajax()) {
//            $services = Service::all();
//            return DataTables::of($services)
//                ->setRowClass(function ($service) {
//                    return 'delete'.$service->id ;
//                })
//                ->addIndexColumn()
//                ->addColumn('action', function($row){
//                    $btn = '<a href="'.route('admin.service.edit',['id'=>$row->id]).'" id="editButton" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-success m-btn m-btn--icon m-btn--icon-only"><i class="fa fa-pencil-alt fa-2x"></i></a>';
//                    $btn = $btn. ' <a href="" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only delete"><i class="fa fa-trash"></i></a>';
//                    return $btn;
//                })
//                ->rawColumns(['action'])
//                ->make(true);
//        }
        $services = Service::all();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.service.index', [
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'services' => $services,
            'userId' => $userId,
            'module' => $module,
        ]);

//        return view('admin.service.index');
    }

    /*----------------------------------------------------------------------------------
        This method use for display Service Create Form
    ------------------------------------------------------------------------------------*/

    public function create($userId,$module){

        return view('admin.service.create',[
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use for Store Item in Database
    ------------------------------------------------------------------------------------*/
    public function store(Request $request,$userId,$module)
    {

        $this->validate($request,[
            'name' => 'required',
        ]);

        $serviceModel = new Service();
        $service = $serviceModel->create([
            'name' => ucwords($request->name),
            'status' => Service::ACTIVE
        ]);

        return redirect()->route('admin.service.index',['userId' => $userId, 'module' => $module])->with('success','Service Added Successfully');

    }

    /*----------------------------------------------------------------------------------
        This method use for display Item Update Form
    ------------------------------------------------------------------------------------*/
    public function edit($id,$userId,$module){

        if(!$service = Service::whereId($id)->first())
        {
            return redirect(route('admin.service.index',['userId' => $userId,'module' => $module]))->with(['error' => 'Invalid id selected']);
        }

        return view('admin.service.edit',[
            'service' => $service,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update Item and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,Request $request,$userId,$module)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $service = Service::find($id);

        if(empty($service)){
            return redirect()->route('admin.service.index',['userId' => $userId,'module' => $module])->with('error','Invalid ID');
        }


        $service->name = ucwords($request->name);
        $service->save();

        return redirect()->route('admin.service.index',['userId' => $userId,'module' => $module])->with('success','Service Updated Successfully');

    }

    /*----------------------------------------------------------------------------------
        This method use to Change Item Status in Database
    ------------------------------------------------------------------------------------*/
    public function changeStatus(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:services,id',
            'status_id' => 'required|in:0,1',
        ]);

        $service = Service::whereId($request->id)->first();

        try{
            if(!empty($service)){

                $service->status = $request->status_id;
                $service->save();

                $serviceChange = Service::whereId($request->id)->first();
                $html = '';

                if($request->status_id == Service::ACTIVE){
                    $html .='<span class="m-badge m-badge--success m-badge--wide statusChange" data-id="'.$serviceChange->id.'" status-id="'.Service::IN_ACTIVE.'" style="cursor: pointer">Active</span>';

                }
                else{
                    $html .='<span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="'.$serviceChange->id.'" status-id="'.Service::ACTIVE.'" style="cursor: pointer">In-Active</span>';

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

    public function delete(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:services,id',
        ]);

        if(!$service = Service::find($request->id)){

            return response()->json([
                'status' => false
            ]);
        }
        $service->delete();
        return response()->json([
            'status' => true
        ]);

    }
}