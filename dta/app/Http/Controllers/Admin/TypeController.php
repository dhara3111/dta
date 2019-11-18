<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index($userId,$module){

        $types = Type::all();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.type.index', [
            'types' => $types,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);

    }
    /*----------------------------------------------------------------------------------
        This method use for display Type Create Form
    ------------------------------------------------------------------------------------*/

    public function create($userId,$module){

        return view('admin.type.create',[
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use for Store Type in Database
    ------------------------------------------------------------------------------------*/
    public function store($userId,$module,Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'key' => 'required',
        ]);

        $typeModel = new Type();
        $type = $typeModel->create([
            'name' => $request->name,
            'key' => $request->key,

        ]);

        return redirect()->route('admin.type.index',['userId' => $userId, 'module' => $module])->with('success','Type Added Successfully');

    }
    /*----------------------------------------------------------------------------------
            This method use for display type Update Form
        ------------------------------------------------------------------------------------*/
    public function edit($id,$userId,$module){

        if(!$type = Type::whereId($id)->first())
        {
            return redirect(route('admin.type.index',['userId' => $userId, 'module' => $module]))->with(['error' => 'Invalid id selected']);
        }

        return view('admin.type.edit',[
            'type' => $type,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update type and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,$userId,$module,Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'key' => 'required',

        ]);

        $type = Type::find($id);

        if(empty($type)){
            return redirect()->route('admin.type.index',['userId' => $userId,'module' => $module])->with('error','Invalid ID');
        }


        $type->name = ucwords($request->name);
        $type->key = $request->key;

        $type->save();

        return redirect()->route('admin.type.index',['userId' => $userId,'module' => $module])->with('success','Type Updated Successfully');

    }
    /*----------------------------------------------------------------------------------
        This method use to delete type
    ------------------------------------------------------------------------------------*/

    public function delete(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:types,id',
        ]);

        if(!$type = Type::find($request->id)){

            return response()->json([
                'status' => false
            ]);
        }
        $type->delete();
        return response()->json([
            'status' => true
        ]);

    }

}
