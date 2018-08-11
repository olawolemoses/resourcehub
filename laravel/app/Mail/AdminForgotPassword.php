<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $user,$token;
    public function __construct($user,$token)
    {
        //
        $this->user = $user;
        $this->token = $token;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          
     $url = "http://sbscdemo.com/resetpassword?code=" . $this->token . "&email=" . $this->user->username;

     return $this->subject("Footprint:Forgot Password")->view('email.adminforgotpassword', compact('url'));
    }
}
