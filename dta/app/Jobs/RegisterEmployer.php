<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class RegisterEmployer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $name, $password,$email;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($name,$email,$password)
    {
        //
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $data = array('name'=>$this->name,'password'=>$this->password,'email'=>$this->email);
        $template_path = 'emails.RegisterEmployer';
        Mail::send($template_path, $data, function($message)  {
            // Set the receiver and subject of the mail.
            $message->to($this->email, '')->subject('Activate Employer Account - EOI360');
            // Set the sender
            $message->from(env('MAIL_USERNAME'),'EOI360');
        });
    }
}
