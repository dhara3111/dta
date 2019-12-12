<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Type;
use PHPMailer\PHPMailer\PHPMailer;
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

        $url = route('admin.instruction.posting',['id'=>$type->id]);

        return response()->json([
            'status' => true,
            'url' => $url,
        ]);
    }

//    public function posting($id){
//
//        $types=Type::all();
//
//        $type = Type::whereId($id)->first();
//        return view('admin.postingInstruction.posting', [
//            'type' => $type,
//            'types' => $types,
//        ]);
//
//    }

    public function postingMail(Request $request,$userId,$module){

        if(!$type=Type::whereId($request->campaignId)->first())
        {
            return redirect(route('admin.postingInstruction.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Invalid Data']);
        }


        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'mail.lawclimb.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'no-reply@lawclimb.com';                     // SMTP username
            $mail->Password   = '32Jager32';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('no_reply@lawclimb.com', 'Lawclimb');
            $mail->addAddress($request->email );     // Add a recipient

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Posting Instructions for '.$type->name;
            $mail->Body = 'Here are your posting instructions: '.ucwords($type->name).' Campaign Posting Instructions:'.$request->postingUrl .' Campaign ID: '.$type->campaign_id.'  Campaign Key:'.$type->campaign_key;

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            return redirect(route('admin.postingInstruction.index',['userId'=>$userId,'module'=>$module]))->with(['success' => 'Posting Instruction sent successfully on Email']);

        } catch (Exception $e) {

            return redirect(route('admin.postingInstruction.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Posting Instruction not sent']);

        }

    }

}
