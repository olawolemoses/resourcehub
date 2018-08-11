<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $token;

    public function __construct( $user, $token )
    {
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

        $url = "http://sbscdemo.com/newpassword?code=" . $this->token . "&email=" . $this->user->username;
       

        //$url = "http://sbscdemo.com/newpassword?uid=1260309&code=EaB2&responseMode=1";
        
        return $this->subject("Footprint:Forgot Password")->view('email.forgotpassword', compact('url'));
    }
}
