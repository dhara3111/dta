<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /*----------------------------------------------------------------------------------
            This method use for display List of Item
    ------------------------------------------------------------------------------------*/

    public function index(){

        $items = Item::all();

        return view('admin.item.index',[
            'items' => $items,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use for display Item Create Form
    ------------------------------------------------------------------------------------*/

    public function create(){

        return view('admin.item.create');
    }

    /*----------------------------------------------------------------------------------
        This method use for Store Item in Database
    ------------------------------------------------------------------------------------*/
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'hsn_code' => 'required',
            'price' => 'required',
        ]);

        $itemModel = new Item();
        $item = $itemModel->create([
            'name' => ucwords($request->name),
            'hsn_code' => $request->hsn_code,
            'price' => $request->price,
            'status' => Item::ACTIVE
        ]);

        return redirect()->route('admin.item.index')->with('success','Item Added Successfully');

    }

    /*----------------------------------------------------------------------------------
        This method use for display Item Update Form
    ------------------------------------------------------------------------------------*/
    public function edit($id){

        if(!$item = Item::whereId($id)->first())
        {
            return redirect(route('admin.item.index'))->with(['error' => 'Invalid id selected']);
        }

        return view('admin.item.edit',[
            'item' => $item,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update Item and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'hsn_code' => 'required',
            'price' => 'required',
        ]);

        $item = Item::find($id);

        if(empty($item)){
            return redirect()->route('admin.item.index')->with('error','Invalid ID');
        }


        $item->name = ucwords($request->name);
        $item->hsn_code  = $request->hsn_code;
        $item->price = $request->price;
        $item->save();

        return redirect()->route('admin.item.index')->with('success','Item Updated Successfully');

    }

    /*----------------------------------------------------------------------------------
        This method use to Change Item Status in Database
    ------------------------------------------------------------------------------------*/
    public function changeStatus(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:items,id',
            'status_id' => 'required|in:0,1',
        ]);

        $item = Item::whereId($request->id)->first();

        try{
            if(!empty($item)){

                $item->status = $request->status_id;
                $item->save();

                $itemChange = Item::whereId($request->id)->first();
                $html = '';

                if($request->status_id == Item::ACTIVE){
                    $html .='<span class="m-badge m-badge--success m-badge--wide statusChange" data-id="'.$itemChange->id.'" status-id="'.Item::IN_ACTIVE.'" style="cursor: pointer">Active</span>';

                }
                else{
                    $html .='<span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="'.$itemChange->id.'" status-id="'.Item::ACTIVE.'" style="cursor: pointer">In-Active</span>';

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
            'id' => 'required|exists:items,id',
        ]);

        if(!$item = Item::find($request->id)){

            return response()->json([
                'status' => false
            ]);
        }
        $item->delete();
        return response()->json([
            'status' => true
        ]);

    }
}
