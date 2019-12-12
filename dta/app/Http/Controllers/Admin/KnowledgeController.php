<?php

namespace App\Http\Controllers\Admin;

use App\Models\Knowledge;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KnowledgeController extends Controller
{
    public function index($userId,$module){

        $knowledge = Knowledge::all();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.knowledge.index', [
            'knowledge' => $knowledge,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);
    }
    /*----------------------------------------------------------------------------------
        This method use for display Knowledge Create Form
    ------------------------------------------------------------------------------------*/

    public function create($userId,$module){

        return view('admin.knowledge.create',[
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use for Store Knowledge in Database
    ------------------------------------------------------------------------------------*/
    public function store($userId,$module,Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'topic_name' => 'required',
            'description' => 'required',
        ]);

        $knowledgeModel = new Knowledge();
        $knowledge = $knowledgeModel->create([
            'topic_name' => ucwords($request->topic_name),
            'description' => $request->description,

        ]);

        return redirect()->route('admin.knowledge.index',['userId' => $userId, 'module' => $module])->with('success','Knowledge Added Successfully');

    }
    /*----------------------------------------------------------------------------------
            This method use for display knowledge Update Form
        ------------------------------------------------------------------------------------*/
    public function edit($id,$userId,$module){

        if(!$knowledge = Knowledge::whereId($id)->first())
        {
            return redirect(route('admin.knowledge.index',['userId' => $userId, 'module' => $module]))->with(['error' => 'Invalid id selected']);
        }

        return view('admin.knowledge.edit',[
            'knowledge' => $knowledge,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update knowledge and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,$userId,$module,Request $request)
    {
        $this->validate($request,[
            'topic_name' => 'required',
            'description' => 'required',
        ]);

        $knowledge = Knowledge::find($id);

        if(empty($knowledge)){
            return redirect()->route('admin.knowledge.index',['userId' => $userId, 'module' => $module])->with('error','Invalid ID');
        }


        $knowledge->topic_name = ucwords($request->topic_name);
        $knowledge->description = $request->description;
        $knowledge->save();

        return redirect()->route('admin.knowledge.index',['userId' => $userId, 'module' => $module])->with('success','Knowledge Updated Successfully');

    }
    /*----------------------------------------------------------------------------------
        This method use to delete knowledge
    ------------------------------------------------------------------------------------*/

    public function delete(Request $request){

//        dd($request->id);
        $this->validate($request,[
            'id' => 'required|exists:knowledge,id',
        ]);

        if(!$knowledge = Knowledge::find($request->id)){

            return response()->json([
                'status' => false
            ]);
        }
        $knowledge->delete();
        return response()->json([
            'status' => true
        ]);

    }
}
