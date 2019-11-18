<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\ForgetPasswordEmail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class ForgetPasswordController extends Controller
{

    /*----------------------------------------------------------------------------------
            This method use for display Forget Password Form
    ------------------------------------------------------------------------------------*/
    public function index(){
        return view('admin.forgetPassword.index');
    }

    /*----------------------------------------------------------------------------------
            This method use to Send Forget Password Mail
    ------------------------------------------------------------------------------------*/
    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

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
                $mail->Body    = '<!DOCTYPE html>
                                    <html>
                                        <head>
                                            <meta charset="utf-8">
                                            <meta http-equiv="x-ua-compatible" content="ie=edge">
                                            <title>Password Reset</title>
                                            <meta name="viewport" content="width=device-width, initial-scale=1">
                                            <style type="text/css">
                                                
                                                @media screen {
                                                    @font-face {
                                                        font-family: \'Source Sans Pro\';
                                                        font-style: normal;
                                                        font-weight: 400;
                                                        src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\');
                                                    }
                                                    @font-face {
                                                        font-family: \'Source Sans Pro\';
                                                        font-style: normal;
                                                        font-weight: 700;
                                                        src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\');
                                                    }
                                                }
                                                
                                                body,
                                                table,
                                                td,
                                                a {
                                                    -ms-text-size-adjust: 100%; /* 1 */
                                                    -webkit-text-size-adjust: 100%; /* 2 */
                                                }
                                                
                                                table,
                                                td {
                                                    mso-table-rspace: 0pt;
                                                    mso-table-lspace: 0pt;
                                                }
                                                
                                                img {
                                                    -ms-interpolation-mode: bicubic;
                                                }
                                                
                                                a[x-apple-data-detectors] {
                                                    font-family: inherit !important;
                                                    font-size: inherit !important;
                                                    font-weight: inherit !important;
                                                    line-height: inherit !important;
                                                    color: inherit !important;
                                                    text-decoration: none !important;
                                                }
                                                
                                                div[style*="margin: 16px 0;"] {
                                                    margin: 0 !important;
                                                }
                                                body {
                                                    width: 100% !important;
                                                    height: 100% !important;
                                                    padding: 0 !important;
                                                    margin: 0 !important;
                                                }
                                              
                                                table {
                                                    border-collapse: collapse !important;
                                                }
                                                a {
                                                    color: #1a82e2;
                                                }
                                                img {
                                                    height: auto;
                                                    line-height: 100%;
                                                    text-decoration: none;
                                                    border: 0;
                                                    outline: none;
                                                }
                                            </style>
                                            ​
                                        </head>
                                        <body style="background-color: #e9ecef;">
                                        
                                            <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
                                                A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.
                                            </div>
                                         
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                               
                                                <tr>
                                                    <td align="center" bgcolor="#e9ecef">
                                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                                            <tr>
                                                                <td align="center" valign="top" width="600">
                                                       
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                                                        <tr>
                                                                            <td align="center" valign="top" style="padding: 36px 24px;">
                                                                                <a href="'.$resetPasswordLink.'" style="display: inline-block;">
                                                                                    <h1 style="margin: 0; font-size: 32px; font-weight: 700;align:center;color:blue;">
                                                                                        Direct To Attorney
                                                                                    </h1>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                 </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- end logo -->
                                                ​
                                                <!-- start hero -->
                                                <tr>
                                                    <td align="center" bgcolor="#e9ecef">
                                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                                            <tr>
                                                                <td align="center" valign="top" width="600">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                                                        <tr>
                                                                            <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                                                                                <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Reset Your Password</h1>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- end hero -->
                                                ​
                                                <!-- start copy block -->
                                                <tr>
                                                    <td align="center" bgcolor="#e9ecef">
                                                        
                                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                                            <tr>
                                                                <td align="center" valign="top" width="600">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                                                        <!-- start copy -->
                                                                        <tr>
                                                                            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                                                                <p style="margin: 0;">Tap the button below to reset your customer account password. If you didn\'t request a new password, you can safely delete this email.</p>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- end copy -->
                                                                        <!-- start button -->
                                                                        <tr>
                                                                            <td align="left" bgcolor="#ffffff">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tr>
                                                                                        <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                                                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                                                <tr>
                                                                                                    <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                                                                                                        <a href="'.$resetPasswordLink.'" style="display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Reset Password Link</a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- end button -->
                                                                        <!-- start copy -->
                                                                       
                                                                        <!-- end copy -->
                                                                        
                                                                        <!-- start copy -->
                                                                        <tr>
                                                                            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                                                                                <p style="margin: 0;">Cheers,<br> Paste</p>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- end copy -->
                                                                
                                                                     </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <![endif]-->
                                                    </td>
                                                </tr>
                                                <!-- end copy block -->
                                                ​
                                                <!-- start footer -->
                                               
                                                <!-- end footer -->
                                                ​
                                            </table>
                                            <!-- end body -->
                                            ​
                                        </body>
                                    </html>
                                    ';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }


            return redirect(route('admin.forgetPassword.index'))->with(['success' => 'Email sent successfully']);
        }
        else{
            return redirect(route('admin.forgetPassword.index'))->with(['error' => 'This email id is not registered on EOI 360']);
        }
    }
}
