<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Type;
use SendGrid\Mail\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostingInstructionController extends Controller
{
    public function index($userId,$module){

        $types = Type::all();

        $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

        return view('admin.postingInstruction.index', [
            'types' => $types,
            'add' => $permission[0]['add'],
            'edit' => $permission[0]['edit'],
            'delete' => $permission[0]['delete'],
            'userId' => $userId,
            'module' => $module,
        ]);

    }

    public function campaignKey(Request $request){

        if(!$type=Type::whereId($request->campaignId)->first())
        {
            return response()->json([
                'status' => false
            ]);
        }

        $url = route('admin.postingInstruction.posting',['id'=>$type->id]);

        return response()->json([
            'status' => true,
            'url' => $url,
        ]);
    }

    public function posting($id){

        $types=Type::all();

        $type = Type::whereId($id)->first();
        return view('admin.postingInstruction.posting', [
            'type' => $type,
            'types' => $types,
        ]);

    }

    public function postingMail(Request $request,$userId,$module){

        if(!$type=Type::whereId($request->campaignId)->first())
        {
            return redirect(route('admin.postingInstruction.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Invalid Data']);
        }

        $API_KEY = "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";
        $email = new \SendGrid\Mail\Mail();

        $email->setSubject('Posting Instructions for '.$type->name);

        $email->setFrom("no_reply@lawclimb.com", "Lawclimb");
        $email->addTo($request->email);

        $email->addContent('text/html', 'Here are your posting instructions: '.ucwords($type->name).' Campaign Posting Instructions:'.$request->postingUrl .' Campaign ID: '.$type->campaign_id.'  Campaign Key:'.$type->campaign_key );

        $sendgrid = new \SendGrid($API_KEY);
        try {
            $response = $sendgrid->send($email);

            return redirect(route('admin.postingInstruction.index',['userId'=>$userId,'module'=>$module]))->with(['success' => 'Posting Instruction sent successfully on Email']);

        } catch (Exception $e) {

            return redirect(route('admin.postingInstruction.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Posting Instruction not sent']);

        }

    }

}
