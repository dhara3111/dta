<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    /*----------------------------------------------------------------------------------
            This method use for display List of Modules
    ------------------------------------------------------------------------------------*/

    public function index(){

        $modules = Module::all();

        return view('admin.module.index',[
            'modules'=>$modules,
        ]);

    }

    /*----------------------------------------------------------------------------------
            This method use for display  Modules create page
     ------------------------------------------------------------------------------------*/

    public function create(){

        return view('admin.module.create');

    }

    /*----------------------------------------------------------------------------------
            This method use for insert Module name
     ------------------------------------------------------------------------------------*/

    public function store(Request $request){

//        dd($request->all());
        $this->validate($request,[
            'folder_name' => 'required',
            'file_name' => 'required',
            'title_name' => 'required',
            'icon' => 'required',
        ]);

        $moduleModel = new Module();
        $module = $moduleModel->create([
            'folder_name' => $request->folder_name,
            'file_name' => $request->file_name,
            'title_name' => $request->title_name,
            'icon' => $request->icon,
            'status' => Module::ACTIVE
        ]);

        $permissionModel = new Permission();
        $permission = $permissionModel->create([
            'user_id' => auth()->user()->id,
            'module_id' => $module->id,
            'view' =>  Permission::ACTIVE,
            'add' =>  Permission::ACTIVE,
            'edit' =>  Permission::ACTIVE,
            'delete' =>  Permission::ACTIVE,
        ]);
        return redirect()->route('admin.module.index')->with('success','Module Added Successfully');


    }
    /*----------------------------------------------------------------------------------
        This method use for display Module Update Form
    ------------------------------------------------------------------------------------*/
    public function edit($id){

        if(!$module = Module::whereId($id)->first())
        {
            return redirect(route('admin.module.index'))->with(['error' => 'Invalid id selected']);
        }

        return view('admin.module.edit',[
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update Module and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,Request $request)
    {
        $this->validate($request,[
            'folder_name' => 'required',
            'file_name' => 'required',
            'title_name' => 'required',
            'icon' => 'required',
        ]);

        $module = Module::find($id);

        if(empty($module)){
            return redirect()->route('admin.module.index')->with('error','Invalid ID');
        }

        $module->folder_name = $request->folder_name;
        $module->file_name = $request->file_name;
        $module->title_name = $request->title_name;
        $module->icon = $request->icon;
        $module->save();

        return redirect()->route('admin.module.index')->with('success','Module Updated Successfully');

    }

    /*----------------------------------------------------------------------------------
        This method use to Change Module Status in Database
    ------------------------------------------------------------------------------------*/
    public function changeStatus(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:modules,id',
            'status_id' => 'required|in:0,1',
        ]);

        $module = Module::whereId($request->id)->first();

        try{
            if(!empty($module)){

                $module->status = $request->status_id;
                $module->save();

                $moduleChange = Module::whereId($request->id)->first();
                $html = '';

                if($request->status_id == Module::ACTIVE){
                    $html .='<span class="m-badge m-badge--success m-badge--wide statusChange" data-id="'.$moduleChange->id.'" status-id="'.Module::IN_ACTIVE.'" style="cursor: pointer">Active</span>';

                }
                else{
                    $html .='<span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="'.$moduleChange->id.'" status-id="'.Module::ACTIVE.'" style="cursor: pointer">In-Active</span>';

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
            'id' => 'required|exists:modules,id',
        ]);

        if(!$module = Module::find($request->id)){

            return response()->json([
                'status' => false
            ]);
        }
        $module->delete();
        return response()->json([
            'status' => true
        ]);

    }

}
