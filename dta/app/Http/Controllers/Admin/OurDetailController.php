<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurDetail;
use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurDetailController extends Controller
{
    /*----------------------------------------------------------------------------------
           This method use for display OurDetail us Lists
   ------------------------------------------------------------------------------------*/
    public function index($userId,$module){

        $ourDetails= OurDetail::all();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.ourDetail.index', [
            'ourDetails'=>$ourDetails,
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

        return view('admin.ourDetail.create',[
            'userId' => $userId,
            'module' => $module,
        ]);
    }


    /*----------------------------------------------------------------------------------
        This method use for Store OurDetail in Database
    ------------------------------------------------------------------------------------*/

    public function store(Request $request,$userId,$module)
    {
//         dd($request->all());

        $this->validate($request,[
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'website' => 'required',
            'website_name' => 'required',
        ]);

        $ourDetailModel = new OurDetail();
        $ourDetail = $ourDetailModel->create([
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'website' => $request->website,
            'website_name' => $request->website_name,
            'status' => OurDetail::ACTIVE
        ]);

        $uploadPath = public_path() . "/ourLogoImages";

        $image = $request->image;
        $favicon = $request->favicon;


        if ($request->hasFile('image')) {
            $tmpFileName1 = Carbon::now()->format('YHisdmu') . '.' . $image->getClientOriginalExtension();
            $file1 = $image->move($uploadPath, $tmpFileName1);

            $ourDetail->image = $tmpFileName1;
            $ourDetail->save();
        }

        if ($request->hasFile('favicon')) {
            $tmpFileName2 = Carbon::now()->format('YHisdmu') . '.' . $favicon->getClientOriginalExtension();
            $file2 = $favicon->move($uploadPath, $tmpFileName2);

            $ourDetail->image = $tmpFileName2;
            $ourDetail->save();
        }


        return redirect()->route('admin.ourDetail.index',[ 'userId' => $userId,'module' => $module,])->with('success','Loan Programs Added Successfully');

    }
    /*----------------------------------------------------------------------------------
        This method use for display Our Detail Update Form
    ------------------------------------------------------------------------------------*/
    public function edit($id,$userId,$module){

        if(!$ourDetail = OurDetail::whereId($id)->first())
        {
            return redirect(route('admin.ourDetail.index',[ 'userId' => $userId, 'module' => $module,]))->with(['error' => 'Invalid id selected']);
        }

        return view('admin.ourDetail.edit',[
            'ourDetail' => $ourDetail,
            'userId' => $userId,
            'module' => $module,
        ]);
    }
    /*----------------------------------------------------------------------------------
        This method use to Update Our Detail in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,Request $request,$userId,$module)
    {
        $this->validate($request,[
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'website' => 'required',
            'website_name' => 'required',
        ]);

        $ourDetail = OurDetail::find($id);

        if(empty($ourDetail)){
            return redirect()->route('admin.ourDetail.index',[ 'userId' => $userId, 'module' => $module,])->with('error','Invalid ID');
        }

        $ourDetail->address = $request->address;
        $ourDetail->mobile = $request->mobile;
        $ourDetail->email = $request->email;
        $ourDetail->website = $request->website;
        $ourDetail->website_name = $request->website_name;
        $ourDetail->save();

        $uploadPath = public_path() . "/ourLogoImages";
        $image = $request->image;
        $favicon = $request->favicon;

        if ($request->hasFile('image')) {
            $tmpFileName1 = Carbon::now()->format('YHisdmu') . '.' . $image->getClientOriginalExtension();
            $file1 = $image->move($uploadPath, $tmpFileName1);

            $ourDetail->image = $tmpFileName1;
            $ourDetail->save();
        }

        if ($request->hasFile('favicon')) {
            $tmpFileName2 = Carbon::now()->format('YHisdmu1234') . '.' . $favicon->getClientOriginalExtension();
            $file2 = $favicon->move($uploadPath, $tmpFileName2);

            $ourDetail->favicon = $tmpFileName2;
            $ourDetail->save();
        }

        return redirect()->route('admin.ourDetail.index',[ 'userId' => $userId, 'module' => $module,])->with('success','Our Detail Us Successfully');

    }


    /*----------------------------------------------------------------------------------
        This method use for deleted Our Detail data Form
    ------------------------------------------------------------------------------------*/
    public function delete(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:our_details,id',
        ]);

        if(!$ourDetail = OurDetail::find($request->id)){

            return response()->json([
                'status' => false
            ]);
        }
        $ourDetail->delete();
        return response()->json([
            'status' => true
        ]);

    }
}
