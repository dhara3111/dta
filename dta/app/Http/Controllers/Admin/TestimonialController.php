<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function index($userId,$module){

        $testimonials = Testimonial::all();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.testimonial.index', [
            'testimonials' => $testimonials,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);


    }
    /*----------------------------------------------------------------------------------
        This method use for display Testimonial Create Form
    ------------------------------------------------------------------------------------*/

    public function create($userId,$module){

        return view('admin.testimonial.create',[
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use for Store Testimonial in Database
    ------------------------------------------------------------------------------------*/
    public function store(Request $request,$userId,$module)
    {
        //dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);

        $testimonialModel = new Testimonial();
        $testimonial = $testimonialModel->create([
            'name' => ucwords($request->name),
            'description' => $request->description,
            'designation' => $request->designation,

        ]);

        $uploadPath= public_path()."/testimonialImages";
        $image = $request->image;

        if ($request->hasFile('image')){
            $tmpFileName = Carbon::now()->format('YHisdmu') . '-' . $image->getClientOriginalName();
            $file = $image->move($uploadPath, $tmpFileName);

            $testimonial->image = $tmpFileName;
            $testimonial->save();
        }


        return redirect()->route('admin.testimonial.index',['userId'=>$userId,'module'=>$module])->with('success','Testimonial Added Successfully');

    }
    /*----------------------------------------------------------------------------------
            This method use for display testimonial Update Form
        ------------------------------------------------------------------------------------*/
    public function edit($id,$userId,$module){

        if(!$testimonial = Testimonial::whereId($id)->first())
        {
            return redirect(route('admin.testimonial.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Invalid id selected']);
        }

        return view('admin.testimonial.edit',[
            'testimonial' => $testimonial,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update testimonial and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,$userId,$module,Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'designation' => 'required',

        ]);

        $testimonial = Testimonial::find($id);

        if(empty($testimonial)){
            return redirect()->route('admin.testimonial.index',['userId'=>$userId,'module'=>$module])->with('error','Invalid ID');
        }


        $testimonial->name = ucwords($request->name);
        $testimonial->description = $request->description;
        $testimonial->designation = $request->designation;
        //$testimonial->save();

        $uploadPath= public_path()."/testimonialImages";
        $image = $request->image;


        if ($request->hasFile('image')){
            $tmpFileName = Carbon::now()->format('YHisdmu') . '-' . $image->getClientOriginalName();
            $file = $image->move($uploadPath, $tmpFileName);

            $testimonial->image = $tmpFileName;

            $testimonial->save();
        }
        $testimonial->save();
        return redirect()->route('admin.testimonial.index',['userId'=>$userId,'module'=>$module])->with('success','Testimonial Updated Successfully');

    }
    /*----------------------------------------------------------------------------------
        This method use to delete testimonial
    ------------------------------------------------------------------------------------*/

    public function delete(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:testimonials,id',
        ]);

        if(!$testimonial = Testimonial::find($request->id)){

            return response()->json([
                'status' => false
            ]);
        }
        $testimonial->delete();
        return response()->json([
            'status' => true
        ]);

    }

}
