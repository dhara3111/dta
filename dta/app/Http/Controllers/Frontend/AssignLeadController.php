<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lead;
use App\Models\Order;
use App\Models\Post;
use App\Models\Session;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Yajra\DataTables\DataTables;

class AssignLeadController extends Controller
{
    public function index(Request $request){

//        $leads = DB::table('leads')
//            ->Join('posts', 'leads.id', '=', 'posts.lead_id')
//            ->get();

        $leads = DB::table('leads')
            ->join('posts', 'leads.id', '=', 'posts.lead_id')
            ->select('leads.*')
            ->get();

        return view('frontend.assignLead.index',[
            'leads'=>$leads,
        ]);
    }

    public function charge(Request $request)
    {

//        dd($request->all());
//        $cpls = $request->cpl;
//        $total=0;
//        foreach ($cpls as  $cpl)
//        {
//            $total=$total + $cpl;
//        }

        $ids=$request->selectId;
        $lead_id='';
        foreach ($ids as  $id)
        {
//            print_r($id);
            $lead_id .= $id.',';
        }
        $lead_id = substr($lead_id, 0, -1);
//        dd($lead_id);
        try {

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => auth()->user()->email,
//                'submit_type' => 'donate',
//                'billing_address_collection' => 'required',
                'line_items' => [[
                    'name' => 'Legal Lead',
//                    'description' => 'Comfortable cotton t-shirt',
//                    'images' => ['https://example.com/t-shirt.png'],
                    'amount' => $request->total * 100,
                    'currency' => 'inr',
                    'quantity' => 1,
                ]],
//            'coupon' => Coupon::BALLER_MONTHLY_COUPON_CODE,
                'success_url' => route('frontend.assignLead.myCheckout',['id'=>$lead_id]).'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('frontend.assignLead.index'),
            ]);
//            $customer = Customer::create(array(
//                'email' => $request->stripeEmail,
//                'source' => $request->stripeToken
//            ));
//
//            $charge = Charge::create(array(
//                'customer' => $customer->id,
//                'amount' => 50,
//                'currency' => 'INR'
//            ));

//            return 'Charge successful, you get the course!';

//            return redirect()->route('frontend.assignLead.index')->with('success','Charge successful, you get the Lead!');

            return redirect()->back()->with([
                'total' => $request->total,
                'CHECKOUT_SESSION_ID' => $session->id,
            ])->withInput();


//            return redirect()->route('frontend.assignLead.index')->with('success','Charge successful, you get the Lead!');


        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function myCheckout($id,Request $request)
    {
//        dd($id);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve(
            $request->session_id
        );
//        $metaData = $_POST['idev_custom'];

        $customer = \Stripe\Customer::retrieve($session->customer);

//        $payment_intent = \Stripe\PaymentIntent::retrieve(
//            $session->payment_intent
//        );
//        $refund = \Stripe\Refund::create([
//            'charge' => $payment_intent['charges']['data'][0]['id'],
//        ]);

//        dd($session,$customer,$payment_intent,$refund);
//        dd($session,$customer);
        $cust = json_encode($customer); // long text
        $sess = json_encode($session); // long text
//        $payment = json_encode($payment_intent); // long text
//        $ref = json_encode($refund); // long text

        $ids=explode(',',$id);
//dd($ids);
        $countLead=count($ids);

        foreach ($ids as $id) {
           $lead = Lead::find($id);
           $lead->sellable = 0;
           $lead->sold = 1;
           $lead->paid = 1;
           $lead->save();
        }

        $user = User::find(auth()->user()->id);
        $user->session = $sess;
        $user->customer = $cust;
        $user->save();

//        dd($session->payment_intent);

        $orderModel = new Order();
        $order = $orderModel->create([
            'user_id' => auth()->user()->id,
            'session_id' => $request->session_id,
            'payment_intent' => $session->payment_intent,
            'customer_id' => $customer->id,
//            'lead_id' => $ids,
            'total_lead' => $countLead,
            'total_amount_of_lead' => $session->display_items[0]['amount'] / 100,
            'refund' => Order::Not_Refund,
            'status' => Order::ACTIVE
        ]);

//        $session->display_items[0]['amount'];

        return redirect()->route('frontend.assignLead.index')->with('success','Payment successful done, you get the Leads!');

    }
}
