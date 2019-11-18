<?php

namespace App\Http\Controllers\Admin;


use App\Models\Permission;
use App\Models\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class AttorneyController extends Controller
{
    public function index($userId,$module,Request $request){


        if ($request->ajax()) {
            $users = User::latest()->whereType('3')->get();

            return DataTables::of($users)
                ->setRowClass(function ($user) {
                    return 'delete'.$user->id ;
                })
                ->addIndexColumn()
                ->addColumn('action', function($row){

//                    $btn = '<a href="'.route('admin.attorney.edit',['id'=>$row->id]).'" id="editButton" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-success m-btn m-btn--icon m-btn--icon-only"><i class="fa fa-pencil-alt fa-2x"></i></a>';

                    $btn = '&nbsp;&nbsp;&nbsp;<a href="" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only delete"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.attorney.index', [

            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);

//        return view('admin.attorney.index');

    }

    /*----------------------------------------------------------------------------------
        This method use for display Attorney Update Form
    ------------------------------------------------------------------------------------*/
    public function edit($id,$userId,$module){


        if(!$user = User::whereId($id)->whereType('3')->first())
        {
            return redirect(route('admin.attorney.index',['userId' => $userId,'module' => $module,]))->with(['error' => 'Invalid id selected..!!']);
        }

        return view('admin.attorney.edit',[
            'user' => $user,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update Attorney and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,Request $request,$userId,$module)
    {
//        dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'expertize_in' => 'required',
            'service_in_city' => 'required',
        ]);

        $user = User::find($id);

        if(empty($user)){
            return redirect()->route('admin.attorney.index')->with('error','Invalid ID..!!');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->street = $request->street;
        $user->area = $request->area;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip_code = $request->zipcode;
        $user->expertize_in = $request->expertize_in;
        $user->service_in_city = $request->expertize_in;

        $user->save();

        return redirect()->route('admin.attorney.index')->with('success','Attorney Updated Successfully..!!');

    }

    /*----------------------------------------------------------------------------------
                This method use to display Import Excel Attorney Page
    ------------------------------------------------------------------------------------*/

    public function import($userId,$module){
        $attorney = User::orderBy('name', 'ASC')->get();
        return view('admin.attorney.import',[
            'attorney'=> $attorney,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Import Excel  Attorney and Store in Database
    ------------------------------------------------------------------------------------*/

    public function importExcel(Request $request,$userId,$module)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();

        $users = (new FastExcel)->import($path, function ($line) {
            $attorney = User::where('email', '=', $line['email'])->first();

            if ($attorney === null) {

                $companyInfo[]= [
                    'name' => $line['name'],
                    'email' => $line['email'],
                    'phone' => $line['phone'],
                    'street' => $line['address'],
                    'city' => $line['city'],
                    'state' => $line['state'],
                    'website' => $line['website'],
                    'zipcode' => $line['zipcode'],
                    'full_address' => $line['full_address'],
                    'expertize_in' => $line['services'],
                    'type' => '3',
                    'profile' => 'admin',
                    'status' => '1'
                ];

                User::insert($companyInfo);

                $service_data=explode(', ',$line['services']);

                foreach ($service_data as $servicedata){

                    $service = Service::where('name', '=', $servicedata)->first();

                    if ($service === null) {
                        // Service doesn't exist
                        $arr[] = ['name' => $servicedata,'status' => Service::ACTIVE];
                        Service::insert($arr);
                    }else{
                        continue;
                    }
                }
            }else{
                return back()->with('error', 'Email already exist. ('.$line['email'].')');
            }
        });
        return back()->with('success', 'Attorney Imported successfully.');
    }


    /*----------------------------------------------------------------------------------
        This method use to Change Admin-User Status in Database
    ------------------------------------------------------------------------------------*/
    public function changeStatus(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:users,id',
            'status_id' => 'required|in:0,1',
        ]);

        $user = User::whereId($request->id)->first();

        try{
            if(!empty($user)){

                $user->status = $request->status_id;
                $user->save();

                $userChange = User::whereId($request->id)->first();
                $html = '';

                if($request->status_id == User::ACTIVE){
                    $html .='<span class="m-badge m-badge--success m-badge--wide statusChange" data-id="'.$userChange->id.'" status-id="'.User::IN_ACTIVE.'" style="cursor: pointer">Active</span>';

                }
                else{
                    $html .='<span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="'.$userChange->id.'" status-id="'.User::ACTIVE.'" style="cursor: pointer">In-Active</span>';

                }
                return response()->json([
                    'status' => true,
                    'message' => "success",
                    'html' => $html,
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => "Something went wrong...!!",
            ]);
        }catch (\Exception $e){

        }

    }

    /*----------------------------------------------------------------------------------
        This method use to Delete Admin-User from Database
    ------------------------------------------------------------------------------------*/
    public function delete(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:users,id',
        ]);

        $user = User::whereId($request->id)->first();
//        $adminUser = AdminUser::whereUserId($request->id)->first();

        try{
            if(!empty($user)){
//                $adminUser->forcedelete();
                $user->forcedelete();

                return response()->json([
                    'status' => true,
                    'message' => "success",
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => "Something went wrong...!!",
            ]);
        }catch (\Exception $e){

        }

    }

}
