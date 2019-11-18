<?php
namespace App\Http\Controllers\Api;
use App\Models\Lead;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function lead(Request $request)
    {
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
            'email_address' => 'required|email,email',
            'sellable' => 'required',
            'sold' => 'required',
            'paid' => 'required',
            'scrubbed' => 'required',
            'trash' => 'required',
            'isTest' => 'required',
            'CPL' => 'required',
            'RPL' => 'required',
            'lp_post_response' => 'required',
            'created_on_date' => 'required',
            'valid' => 'required',
            'comments' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->lp_response == "XML") {
                $data = [
                    'success' => 'failed',
                    'code' => '404',
                    'message' => 'Invalid Data',

                ];
                return response()->xml($data);

            } else if ($request->lp_response == "JSON") {

                return $this->sendError('Invalid Data', 'Your data is invalid!',401);

            } else {
                $data = [
                    'success' => 'failed',
                    'code' => '404',
                    'message' => 'Invalid Data',

                ];
                return response()->xml($data);
            }
        }

        try {
            if(!$type=Type::whereCampaignId($request->lp_campaign_id)->first())
            {
                return response()->json([
                    'message' => 'Lead not successfully store in database.Please check your data. !!'
                ], 404);
            }

            if($type->campaign_id == $request->lp_campaign_id) {
                if($type->campaign_key == $request->lp_campaign_key) {
                    $lead = new Lead([
                        'lp_campaign_id' => $request->lp_campaign_id,
                        'lp_campaign_key' => $request->lp_campaign_key,
                        'lp_test' => $request->lp_test,
                        'lp_response' => $request->lp_response,
                        'lead_id' => $request->leadID,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_home' => $request->phone_home,
                        'city' => $request->city,
                        'state' => $request->state,
                        'zipcode' => $request->zipcode,
                        'email_address' => $request->email_address,
                        'ip_address' => $request->ip_address,
                        'type_id' => $request->campaignName,
                        'valid' => $request->valid,
                        'comments' => $request->comments,
                        'sellable' => $request->sellable,
                        'sold' => $request->sold,
                        'paid' => $request->paid,
                        'scrubbed' => $request->scrubbed,
                        'trash' => $request->trash,
                        'isTest' => $request->isTest,
                        'CPL' => $request->CPL,
                        'RPL' => $request->RPL,
                        'lp_post_response' => $request->lp_post_response,
                        'created_on_date' => $request->createdOnDate,
                    ]);
                    $lead->save();

                    if ($request->lp_response == "XML") {
                        $data = [
                            'success' => 'true',
                            'code' => '200',
                            'message' => 'Lead Accepted',

                        ];
                        return response()->xml($data);

                    } else if ($request->lp_response == "JSON") {

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
                        'message' => 'Lead not successfully store in database.Please check your data. !!'
                    ], 404);
                }
            }
            else
            {
                return response()->json([
                    'message' => 'Lead not successfully store in database.Please check your data. !!'
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
