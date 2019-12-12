<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $name, $resetPasswordLink,$email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$name, $resetPasswordLink)
    {
        //
        $this->email = $email;
        $this->name = $name;
        $this->resetPasswordLink = $resetPasswordLink;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $data = array('name'=>$this->name,'resetPasswordLink'=>$this->resetPasswordLink);
        $template_path = 'emails.forgetPassword';
        Mail::send($template_path, $data, function($message)  {
            // Set the receiver and subject of the mail.
            $message->to($this->email, '')->subject('Forgot Password - EOI360');
            // Set the sender
            $message->from(env('MAIL_USERNAME'),'EOI360');
        });
    }
}
