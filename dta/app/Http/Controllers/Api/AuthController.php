<?php
namespace App\Http\Controllers\Api;
use App\Models\Lead;
use App\Models\Type;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends BaseController
{

    public function index()
    {
        $lead=Lead::all();
        return $this->sendResponse('All Lead Data.',$lead);

    }
    public function leadData(Request $request)
    {
//       dd($request->all());
        $validator = Validator::make($request->all(), [
            'lp_campaign_id' => 'required',
            'lp_campaign_key' => 'required',
            'lp_test' => 'required',
            'lp_response' => 'required',
            'leadID' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_home' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'email_address' => 'required|email',
//            'sellable' => 'required',
//            'sold' => 'required',
//            'paid' => 'required',
//            'scrubbed' => 'required',
//            'trash' => 'required',
//            'isTest' => 'required',
            'CPL' => 'required',
            'RPL' => 'required',
//            'lp_post_response' => 'required',
//            'created_on_date' => 'required',
            'valid' => 'required',
            'comments' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->lp_response == "XML") {
                $data = [
                    'success' => 'failed',
                    'code' => '404',
                    'message' => 'Your data is invalid...!!',

                ];
                return response()->xml($data);

            } else if ($request->lp_response == "JSON") {

                return $this->sendError('Invalid Data', 'Your data is invalid...!!',401);

            } else {
                $data = [
                    'success' => 'failed',
                    'code' => '404',
                    'message' => 'Your data is invalid...!!',

                ];
                return response()->xml($data);
            }
        }

        try {
            if(!$type=Type::whereCampaignId($request->lp_campaign_id)->first())
            {
                return response()->json([
                    'message' => 'Lead not successfully store in database.Please check your data...!!'
                ], 404);
            }

            if($type->campaign_id == $request->lp_campaign_id) {
                if($type->campaign_key == $request->lp_campaign_key) {
                    $leadModel = new Lead();
                    $lead = $leadModel->create([
                        'lp_campaign_id' => $request->lp_campaign_id,
                        'lp_campaign_key' => $request->lp_campaign_key,
                        'lp_test' => $request->lp_test,
                        'lp_response' => $request->lp_response,
                        'leadID' => $request->leadID,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_home' => $request->phone_home,
                        'city' => $request->city,
                        'state' => $request->state,
                        'zip_code' => $request->zipcode,
                        'email_address' => $request->email_address,
                        'ip_address' => $request->ip_address,
                        'type_id' => $request->campaignName,
                        'valid' => $request->valid,
                        'comments' => $request->comments,
                        'sellable' => '1',
                        'sold' => '0',
                        'paid' => '0',
                        'scrubbed' => 'no',
                        'trash' => 'no',
                        'isTest' => 'no',
                        'CPL' => $request->CPL,
                        'RPL' => $request->RPL,
//                        'lp_post_response' => $request->lp_post_response,
//                        'created_on_date' => $request->createdOnDate,
                        'status' => Lead::ACTIVE,
                    ]);
                    $lead->save();

                    $lead_zip_code=$lead->zip_code;

                    //zip codes api start
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://www.zipwise.com/webservices/radius.php?key=vzwb99y3afeacpf8&zip=".$lead_zip_code."&radius=30&format=json",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_POSTFIELDS => "{}",
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        $curl_zips = json_decode($response, true);
                    }

//                    if(!$attorneys= DB::table('users')
//                        ->where('type', '=', 3)
//                        ->where('expertize_in', 'like', '%'.$type->name.'%')
//                        ->where('expertize_in', 'like', '%'.$type->name.'%')
//                        ->get())
//                    {
//                        return response()->json([
//                            'status' => false
//                        ]);
//                    }

                    // PHP MAIL  functionality start
                    $mail = new PHPMailer(true);

                    //Server settings
                    $mail->SMTPDebug = false;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host       = 'mail.lawclimb.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'no-reply@lawclimb.com';                     // SMTP username
                    $mail->Password   = '32Jager32';                               // SMTP password
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to

                    $lead_data=Lead::where('id',$lead->id)->first();
                    $type=Type::whereCampaignKey($lead_data->lp_campaign_key)->first();

                    $zip_code='';
                    foreach ($curl_zips as $index =>  $zipcodes)
                    {
                        foreach ($zipcodes as $index =>  $zipcode)
                        {
                            $attorneys= DB::table('users')
                                ->where('type', '=', 3)
                                ->where('expertize_in', 'like', '%'.$type->name.'%')
                                ->whereZipcode($zipcode['zip'])->get();

                            $zip_code .= $zipcode['zip'].',';

//                          $zip_code = substr($zip_code, 0, -1);

                            foreach ($attorneys as $attorney){
                                $today = new \DateTime();
                                $token = str_random(64);

                                $user  = User::whereEmail($attorney->email)->whereType('3')->first();
                                $user->access_token = $token;
                                $user->access_token_sent_at = $today;
                                $user->save();

                                $path=route('frontend.editProfile.index',['key'=>encrypt($token),'id'=>$user->id]);

                                //Recipients
                                $mail->setFrom('no-reply@lawclimb.com', 'Lawclimb');
                                $mail->addAddress($attorney->email,$attorney->name );     // Add a recipient

                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = $lead_data->first_name." ".$lead_data->last_name." needs ".ucfirst($type->name)." in ".$lead_data->city.",".$lead_data->state;
                            $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                      '.$lead_data->first_name." ".$lead_data->last_name." needs ".ucfirst($type->name)." in ".$lead_data->city.",".$lead_data->state.'
                    </td>
                  </tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                      <table width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                            '.$lead_data->city.",".$lead_data->state." ".$lead_data->zipcode.'
                          </td>
                        </tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                            <a href="'.$path.'" class="btn-primary" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f5707a; margin: 0; border-color: #f5707a; border-style: solid; border-width: 10px 20px;">View Job</a>
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
        </html>';

                                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                $mail->send();


                                $user=User::whereEmail('dwarkesh.developer@gmail.com')->first();
                                $attorney_id=User::where('email',$attorney->email)->first();

        //                        dd($lead_data->leadID);
                                $postModel = new Post();
                                $post = $postModel->create([
                                    'lead_id' => $lead_data->id,
                                    'lead_code' => $lead_data->lp_campaign_key,
                                    'from_id' => $user->id,
                                    'to_id' => $attorney_id->id,
        //                    'lead_cpl' => $attorney_id->id,
                                ]);

                            }
                        }
                    }
                    if ($lead_data->lp_response == "XML") {
                        $data = [
                            'success' => 'true',
                            'code' => '200',
                            'message' => 'Lead Accepted',

                        ];
                        return response()->xml($data);

                    } else if ($lead_data->lp_response == "JSON") {

                        return $this->sendResponse('Lead successfully store in database.');
                    } else {
                        $data = [
                            'success' => 'failed',
                            'code' => '404',
                            'message' => 'Lead Rejected',

                        ];
                        return response()->xml($data);
                    }
                }
                else
                {
                    return response()->json([
                        'message' => 'Lead not successfully store in database.Please check your data...!!'
                    ], 404);
                }
            }
            else
            {
                return response()->json([
                    'message' => 'Lead not successfully store in database.Please check your data...!!'
                ], 404);
            }
        }catch (\Exception $e){
//            return $this->sendError($e->getMessage());
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
