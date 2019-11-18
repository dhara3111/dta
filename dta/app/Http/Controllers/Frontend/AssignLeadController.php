<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class AssignLeadController extends Controller
{
    public function index(Request $request){
        $leads = Lead::latest()->get();

//        if ($request->ajax()) {
//
//            return DataTables::of($leads)
//                ->setRowClass(function ($lead) {
//                    return 'delete'.$lead->id ;
//                })
//                ->addColumn('send', function($row){
//
//                    $btn = '<a href="javascript:void(0)" data-campaign="'.$row->lp_campaign_key.'" data-leadkey="'.$row->leadID.'" data-leadid="'.$row->id.'" class="m-badge m-badge--success m-badge--wide btnSendMail">Send</a>';
//
//                    return $btn;
//                })
//                ->addColumn('sellable', function($row){
//                    if($row->sellable == 'Yes'){
//
//                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
//                    }
//                    else{
//                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
//                    }
//                })
//                ->addColumn('sold', function($row){
//                    if($row->sold == 'Yes'){
//
//                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
//                    }
//                    else{
//                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
//                    }
//                })
//                ->addColumn('paid', function($row){
//                    if($row->paid == 'Yes'){
//
//                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
//                    }
//                    else{
//                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
//                    }
//                })
//                ->addColumn('scrubbed', function($row){
//                    if($row->scrubbed == 'Yes'){
//
//                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
//                    }
//                    else{
//                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
//                    }
//                })
//                ->addColumn('trash', function($row){
//                    if($row->trash == 'Yes'){
//
//                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
//                    }
//                    else{
//                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
//                    }
//                })
//                ->addColumn('isTest', function($row){
//                    if($row->isTest == 'Yes'){
//
//                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
//                    }
//                    else{
//                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
//                    }
//                })
//                ->addIndexColumn()
//                ->rawColumns(['send','sellable','sold','paid','scrubbed','trash','isTest'])
//                ->make(true);
//
//        }

        return view('frontend.assignLead.index',[
            'leads'=>$leads,
        ]);


    }
}
