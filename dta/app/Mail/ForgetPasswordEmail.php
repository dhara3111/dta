<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$subject,$resetPasswordLink;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$subject,$resetPasswordLink)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->resetPasswordLink = $resetPasswordLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forgetPassword')->subject($this->subject);
    }
}
