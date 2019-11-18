<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lead;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Type;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SendGrid\Mail\Mail;
use Yajra\DataTables\DataTables;
class LeadController extends Controller
{
    public function index(Request $request,$userId,$module){
        //echo 'hello'; die();
        //print_r($request->all()); die();
//        $curl = curl_init();
//
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => "https://api.leadspedia.com/core/v2/leads/getAll.do?limit=100&groupID=1&start=0&fromDate=2019%2F08%2F08&scrubbed=No&paid=No&api_secret=1d36ddc4fde5bf92f67215dd470203ab&api_key=593c6ee8df0b70098b96f50f38b5357e",
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => "",
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 30,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_POSTFIELDS => "{}",
//        ));
//
//        $response = curl_exec($curl);
//        $err = curl_error($curl);
//
//        curl_close($curl);
//
//        if ($err) {
//            echo "cURL Error #:" . $err;
//        } else {
//            $someArray = json_decode($response, true);
//            $LeadDatas=$someArray['response']['data']; // Access Array data
//        }
//dd($LeadDatas);

//        foreach ($LeadDatas as $index => $LeadData) {
//            $leadModel = new Lead();
//            $lead = $leadModel->create([
//                'leadID' => $LeadData['leadID'],
//                'first_name' => $LeadData['first_name'],
//                'last_name' => $LeadData['last_name'],
//                'phone_home' => $LeadData['phone_home'],
//                'affiliate_name' => $LeadData['affiliateName'],
//                'campaign_name' => $LeadData['campaignName'],
//                'sellable' => $LeadData['sellable'],
//                'sold' => $LeadData['sold'],
//                'paid' => $LeadData['paid'],
//                'scrubbed' => $LeadData['scrubbed'],
//                'trash' => $LeadData['trash'],
//                'isTest' => $LeadData['isTest'],
//                'CPL' => $LeadData['CPL'],
//                'RPL' => $LeadData['RPL'],
//                'lp_post_response' => $LeadData['lp_post_response'],
//                'created_on_date' => $LeadData['createdOnDate'],
//
//            ]);
//        }
        //dd($request->all());

        if ($request->ajax()) {
            $leads = Lead::latest()->get();

            return DataTables::of($leads)
                ->setRowClass(function ($lead) {
                    return 'delete'.$lead->id ;
                })
                ->addColumn('send', function($row){

                    $btn = '<a href="javascript:void(0)" data-campaign="'.$row->lp_campaign_key.'"  data-leadkey="'.$row->leadID.'" data-leadid="'.$row->id.'" class="m-badge m-badge--success m-badge--wide btnSendMail">Send</a>';

                    return $btn;
                })
                ->addColumn('sellable', function($row){
                    if($row->sellable == 'Yes'){

                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
                    }
                    else{
                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
                    }
                })
                ->addColumn('sold', function($row){
                    if($row->sold == 'Yes'){

                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
                    }
                    else{
                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
                    }
                })
                ->addColumn('paid', function($row){
                    if($row->paid == 'Yes'){

                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
                    }
                    else{
                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
                    }
                })
                ->addColumn('scrubbed', function($row){
                    if($row->scrubbed == 'Yes'){

                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
                    }
                    else{
                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
                    }
                })
                ->addColumn('trash', function($row){
                    if($row->trash == 'Yes'){

                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
                    }
                    else{
                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
                    }
                })
                ->addColumn('isTest', function($row){
                    if($row->isTest == 'Yes'){

                        return '<img src="'.asset('assets/app/media/img/icons/status-green.png').'">';
                    }
                    else{
                        return '<img src="'.asset('assets/app/media/img/icons/status-gray.png').'">';
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['send','sellable','sold','paid','scrubbed','trash','isTest'])
                ->make(true);
        }

//        return view('admin.lead.index');

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.lead.index', [

            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);


    }

    public function getAttorney(Request $request){

        if(!$type=Type::where('key',$request->campaign)->first())
        {
            return response()->json([
                'status' => false
            ]);
        }

        if(!$attorneys= DB::table('users')
            ->where('type', '=', 3)
            ->where('expertize_in', 'like', '%'.$type->name.'%')
            ->get())
        {
            return response()->json([
                'status' => false
            ]);
        }

        $html = "";

        foreach($attorneys as $index => $attorney) {
            $html.='<tr class="delete'.$attorney->id.'">';
            $html.='    <td>';
            $html.='        <strong class="m--margin-left-10">'.$attorney->name ? $attorney->name : '-'.'</strong>';
            $html.='    </td>';
            $html.='    <td>';
            $html.='        <strong class="m--margin-left-10">'.$attorney->email ? $attorney->email : '-'.'</strong>';
            $html.='        <input type="hidden" name="leadkey" id="leadkey" value="'.$request->leadkey.'">';
            $html.='        <input type="hidden" name="leadid" id="leadid" value="'.$request->leadid.'">';
            $html.='    </td>';
            $html.='    <td>';
            $html.='       <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">
                               <input type="checkbox" name="checkdata[]" id="child_'.$index.'" class="attorney" value="'.$attorney->email.'">
                               <span></span>
                           </label>';
            $html.='    </td>';
            $html.='</tr>';


        }

        return response()->json([
            'status' => true,
            'html' => $html,
        ]);
    }

    public function sendMail(Request $request){

        $request->attornies=array("0" => 'anantp27@gmail.com');

        $lead_data=Lead::where('id',$request->leadid)->first();
        $types=Type::where('key',$lead_data->lp_campaign_key)->first();

        $API_KEY = "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";
            $email = new \SendGrid\Mail\Mail();
            $email->setSubject($lead_data->first_name." ".$lead_data->last_name." needs ".ucfirst($types->name)." in ".$lead_data->city.",".$lead_data->state);
            $email->setFrom("sales@lawclimb.com", "Lawclimb");
            foreach ($request->attornies as $attorney){
                $user = User::whereEmail($attorney)->first();
                $email->addTo($attorney, $attorney);

                $user_id=Auth::user()->id;
                $attorney_id=User::where('email',$attorney)->first();

                $postModel = new Post();
                $post = $postModel->create([
                    'lead_id' => $request->leadid,
                    'lead_code' => $request->leadkey,
                    'from_id' => $user_id,
                    'to_id' => $attorney_id->id,
                ]);

            }
            $email->addContent(
                'text/html', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Your Title Goes Here</title>


<style type="text/css">
img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
}
body {
background-color: #f6f6f6;
}
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }
  h1 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h2 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h3 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h4 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h1 {
    font-size: 22px !important;
  }
  h2 {
    font-size: 18px !important;
  }
  h3 {
    font-size: 16px !important;
  }
  .container {
    padding: 0 !important; width: 100% !important;
  }
  .content {
    padding: 0 !important;
  }
  .content-wrap {
    padding: 10px !important;
  }
  .invoice {
    width: 100% !important;
  }
}
</style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
    <td class="container" width="600" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
      <div class="content" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
        <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #36404e; margin: 0; padding: 20px;" align="center" bgcolor="#2f353f" valign="top">
              '.$lead_data->first_name." ".$lead_data->last_name." needs ".ucfirst($types->name)." in ".$lead_data->city.",".$lead_data->state.'
            </td>
          </tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
              <table width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                    '.$lead_data->city.",".$lead_data->state." ".$lead_data->zipcode.'
                  </td>
                </tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                    <a href="https://leadcallz.leadspedia.net/advertiser/signup/" class="btn-primary" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f5707a; margin: 0; border-color: #f5707a; border-style: solid; border-width: 10px 20px;">View Job</a>
                  </td>
                </tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                    Thanks for choosing Direct To Attorney.
                  </td>
                </tr></table></td>
          </tr></table><div class="footer" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
          <table width="100%" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="#" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Unsubscribe</a> from these alerts.</td>
            </tr></table></div></div>
    </td>
    <td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
  </tr></table></body>
</html>');
            $sendgrid = new \SendGrid($API_KEY);
            try {
                $response = $sendgrid->send($email);

                return response()->json([
                    'status' => true
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => false
                ]);
            }

    }


}
