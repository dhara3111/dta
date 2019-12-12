<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseLeadController extends Controller
{
    public function index(Request $request){


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
//                    if($row->sold == '1'){
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

        $leads = Lead::whereSold('1')->whereStatus('1')->get();

        return view('frontend.purchaseLead.index',[
            'leads'=>$leads,
        ]);

    }

//    public function refund($id,Request $request)
//    {
////        dd($id);
//        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//        $session = \Stripe\Checkout\Session::retrieve(
//            $request->session_id
//        );
////        $metaData = $_POST['idev_custom'];
//
//        $customer = \Stripe\Customer::retrieve($session->customer);
//
//        $payment_intent = \Stripe\PaymentIntent::retrieve(
//            $session->payment_intent
//        );
//        $refund = \Stripe\Refund::create([
//            'charge' => $payment_intent['charges']['data'][0]['id'],
//        ]);
//
////        dd($session,$customer,$payment_intent,$refund);
////        $cust = json_encode($customer); // long text
////        $sess = json_encode($session); // long text
////        $payment = json_encode($payment_intent); // long text
////        $ref = json_encode($refund); // long text
//
//        $ids=explode(',',$id);
////        dd($ids);
//        foreach ($ids as $id) {
//            $lead = Lead::find($id);
//            $lead->sold = '1';
//            $lead->save();
//        }
//
//        return redirect()->route('frontend.assignLead.index')->with('success','Payment successful done, you get the Leads!');
//
//    }
}
