<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Facades\Hash;


class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($email)
    {
        $this->data = $email;
    }

    /**
     * Build the message.
     *                                 
                                
     * @return $this
     */
    public function build()
    {
        $pasword = $this->data;
        //dd($pasword);
        return $this->subject('Forgot Password')->view('forgot_password', compact('pasword'));
    }
}
