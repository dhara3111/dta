<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request){

        $orders=Order::whereStatus('1')->get();

        return view('frontend.orderLead.index',[
            'orders'=>$orders,
        ]);
    }

    public function refund(Request $request)
    {
//        dd($request->all());

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve(
            $request->session_id
        );

        $payment_intent = \Stripe\PaymentIntent::retrieve(
            $session->payment_intent
        );

        $refund = \Stripe\Refund::create([
            'charge' => $payment_intent['charges']['data'][0]['id'],
        ]);

        $payment = json_encode($payment_intent); // long text
        $ref = json_encode($refund); // long text

        $user = User::find(auth()->user()->id);
        $user->payment = $payment;
        $user->refund = $ref;
        $user->save();


        $order = Order::whereId($request->id)->whereUserId(auth()->user()->id)->first();
        $order->charge_id = $payment_intent['charges']['data'][0]['id'];
        $order->reason = $request->reason;
        $order->description = $request->description;
        $order->refund = Order::Refund;
        $order->status = Order::IN_ACTIVE;
        $order->save();

        return redirect()->route('frontend.orderLead.index')->with('success','Refund Payment successful done...!!');

    }

    public function refundOrder(Request $request){

        $orders=Order::whereStatus('0')->get();

        return view('frontend.orderLead.refundOrder',[
            'orders'=>$orders,
        ]);
    }
}
