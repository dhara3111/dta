<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\RegisterAdminUser;
use App\Jobs\RegisterEmployer;
use App\Mail\SignupEmail;
use App\Models\AdminUser;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use DB;
use Keygen\Keygen;
use PHPMailer\PHPMailer\PHPMailer;
use Yajra\DataTables\DataTables;
use Stripe;
use Stripe\Error;

class AdminUserController extends Controller
{

    /*----------------------------------------------------------------------------------
            This method use for display List of Admin-User
    ------------------------------------------------------------------------------------*/

    public function index($userId,$module)
    {
        if (Auth::user()->type == User::Developer ) {

            $id=Auth::user()->id;

            $users = User::where('id','!=',$id)->where('type','!=','3')->get();
//dd($users);
            $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

            return view('admin.adminUser.index', [
                'users' => $users,
                'add' => $permission[0]['add'],
                'edit' => $permission[0]['edit'],
                'delete' => $permission[0]['delete'],
                'userId' => $userId,
                'module' => $module,
            ]);
        }
        else if (Auth::user()->type == User::SuperAdmin) {

            $users = User::where('id','!=','0')->whereType('2')->where('type','!=','3')->get();

            $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

            return view('admin.adminUser.index', [
                'users' => $users,
                'add' => $permission[0]['add'],
                'edit' => $permission[0]['edit'],
                'delete' => $permission[0]['delete'],
                'userId' => $userId,
                'module' => $module,
            ]);
        }
        else if (Auth::user()->type == User::Admin) {

            $id=Auth::user()->id;

            $users = User::where('id','!=',$id)->whereType('2')->where('type','!=','3')->get();

            $permission=Permission::whereUserId($userId)->whereModuleId($module)->get();

            return view('admin.adminUser.index', [
                'users' => $users,
                'add' => $permission[0]['add'],
                'edit' => $permission[0]['edit'],
                'delete' => $permission[0]['delete'],
                'userId' => $userId,
                'module' => $module,
            ]);
        }
    }

    /*----------------------------------------------------------------------------------
        This method use for display Admin-User Create Form
    ------------------------------------------------------------------------------------*/

    public function create($userId,$module){

        $modules=Module::whereStatus('1')->get();

        return view('admin.adminUser.create',[
            'modules'=>$modules,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use for Store Admin-User in Database
    ------------------------------------------------------------------------------------*/
    public function store($userId,$module,Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $keystring = str_random(16);

        if (Auth::user()->type == User::Developer){
            $userModel = new User();
            $user = $userModel->create([
                'name' => ucwords($request->name),
                'email' => $request->get('email'),
                //            'password' => Hash::make($request->password),
                'keystring' => $keystring,
                'type' => User::SuperAdmin,
                'profile' => 'admin',
                'status' => User::IN_ACTIVE
            ]);
        }else{
            $userModel = new User();
            $user = $userModel->create([
                'name' => ucwords($request->name),
                'email' => $request->get('email'),
                //            'password' => Hash::make($request->password),
                'keystring' => $keystring,
                'type' => User::Admin,
                'profile' => 'admin',
                'status' => User::IN_ACTIVE
            ]);
        }

        if ($request->has('permission')) {
            foreach ($request->permission as $module_id => $permission) {
                // dd($permission);
                $permissionModel = new Permission();
                $permission = $permissionModel->create([
                    'user_id' => $user->id,
                    'module_id' => $module_id,
                    'view' =>  isset($permission['view']) ? $permission['view'] : 0,
                    'add' =>  isset($permission['add']) ? $permission['add']: 0,
                    'edit' =>  isset($permission['edit']) ? $permission['edit'] : 0,
                    'delete' =>  isset($permission['delete']) ? $permission['delete'] : 0,
                ]);
            }
        }

        $email = $request->email;

        $userCheck  = User::whereEmail($email)->exists();

        if ($userCheck) {

            $today = new \DateTime();
            $token = str_random(64);

            $user  = User::whereEmail($email)->first();

            $user->reset_password_token = $token;
            $user->reset_password_sent_at = $today;
            $user->unlock_token = User::SET;
            $user->save();

            /* Send reset link to user via mail */

            $name = $user->name;

            $resetPasswordLink = route('admin.resetPassword.index',['key'=>encrypt($token),'id'=>$user->id]);


            // $this->dispatch(new ForgetPasswordEmail($email,$name, $resetPasswordLink));
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = false;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'mail.gglfdreambharat.org.in';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'no-reply@gglfdreambharat.org.in';                     // SMTP username
                $mail->Password   = 'Current@2019';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('no-reply@gglfdreambharat.org.in', 'Mailer');
                $mail->addAddress($email, $name);     // Add a recipient
//                $mail->addAddress('anant@dwarkeshit.com');               // Name is optional

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body = 'Please Reset Your Password From This Link : <a href="'.$resetPasswordLink.'">Reset Password</a>';



                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }


            return redirect(route('admin.adminUser.index',['userId'=>$userId,'module'=>$module]))->with(['success' => 'Sub-Admin Created & Reset Password link sent successfully on Email']);

        }
        else{
            return redirect(route('admin.adminUser.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'This email id is not registered']);
        }

//        return redirect()->route('admin.adminUser.index')->with('success','Sub-Admin Created Successfully');

    }

    /*----------------------------------------------------------------------------------
        This method use for display Admin-User Update Form
    ------------------------------------------------------------------------------------*/
    public function edit($id,$userId,$module){

        if(!$modules = Module::whereStatus('1')->get()){
            return redirect(route('admin.adminUser.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Invalid id selected']);
        }

        if(!$user = User::whereId($id)->first())
        {
            return redirect(route('admin.adminUser.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Invalid id selected']);
        }

        if(!$permissions = Permission::whereUserId($user->id)->get())
        {
            return redirect(route('admin.adminUser.index',['userId'=>$userId,'module'=>$module]))->with(['error' => 'Invalid id selected']);
        }

        // dd($modules);
        return view('admin.adminUser.edit',[
            'modules' => $modules,
            'user' => $user,
            'permissions' => $permissions,
            'userId' => $userId,
            'module' => $module,
        ]);
    }

    /*----------------------------------------------------------------------------------
        This method use to Update Admin-User and Store in Database
    ------------------------------------------------------------------------------------*/
    public function update($id,$userId,$module,Request $request)
    {

//        dd($request->all());

        $this->validate($request,[
            'name' => 'required',
//            'email' => 'required|email|unique:users,email',
        ]);

        $keystring = str_random(16);

        $user = User::find($id);

        if(empty($user)){
            return redirect()->route('admin.adminUser.index',['userId'=>$userId,'module'=>$module])->with('error','Invalid ID');
        }

        $user->name = ucwords($request->name);
        $user->email = $request->email;
        $user->keystring = $keystring;
//        $user->password = ucwords($request->password);
        $user->save();


        $permissions = Permission::whereUserId($id)->get();
        $permissions->map(function ($permission) {
            return $permission->delete();
        });

        if ($request->has('permission')) {
            foreach ($request->permission as $module_id => $permission) {
                $permissionModel = new Permission();
                $permission = $permissionModel->create([
                    'user_id' => $user->id,
                    'module_id' => $module_id,
                    'view' =>  isset($permission['view']) ? $permission['view'] : 0,
                    'add' =>  isset($permission['add']) ? $permission['add']: 0,
                    'edit' =>  isset($permission['edit']) ? $permission['edit'] : 0,
                    'delete' =>  isset($permission['delete']) ? $permission['delete'] : 0,
                ]);
            }
        }

        return redirect()->route('admin.adminUser.index',['userId'=>$userId,'module'=>$module])->with('success','Admin User Updated Successfully');

    }

    /*----------------------------------------------------------------------------------
        This method use to Change Admin-User Status in Database
    ------------------------------------------------------------------------------------*/
    public function changeStatus(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:users,id',
            'status_id' => 'required|in:0,1',
        ]);

        $user = User::whereId($request->id)->first();

        try{
            if(!empty($user)){

                $user->status = $request->status_id;
                $user->save();

                $userChange = User::whereId($request->id)->first();
                $html = '';

                if($request->status_id == User::ACTIVE){
                    $html .='<span class="m-badge m-badge--success m-badge--wide statusChange" data-id="'.$userChange->id.'" status-id="'.User::IN_ACTIVE.'" style="cursor: pointer">Active</span>';

                }
                else{
                    $html .='<span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="'.$userChange->id.'" status-id="'.User::ACTIVE.'" style="cursor: pointer">In-Active</span>';

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

    /*----------------------------------------------------------------------------------
        This method use to Change Admin-User Password and store in Database
    ------------------------------------------------------------------------------------*/
    public function changePassword(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:users,id',
            'password' => 'required',
        ]);

        $user = User::whereId($request->id)->first();

        try{
            if(!empty($user)){

                $user->password = bcrypt($request->password);
                $user->save();

                return response()->json([
                    'status' => true,
                    'message' => "success",
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => "Something went wrong...",
            ]);
        }catch (\Exception $e){

        }

    }

    /*----------------------------------------------------------------------------------
        This method use to Delete Admin-User from Database
    ------------------------------------------------------------------------------------*/
    public function delete(Request $request){

        $this->validate($request,[
            'id' => 'required|exists:users,id',
        ]);

        $user = User::whereId($request->id)->first();
//        $adminUser = AdminUser::whereUserId($request->id)->first();

        try{
            if(!empty($user)){
//                $adminUser->forcedelete();
                $user->forcedelete();

                return response()->json([
                    'status' => true,
                    'message' => "success",
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => "Something went wrong...",
            ]);
        }catch (\Exception $e){

        }

    }
}
