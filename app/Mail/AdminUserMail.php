<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->data = $mail_data;
    }

    /**
     * Build the message.
     *                                 
                                
     * @return $this
     */
    public function build()
    {
        $order = $this->data;

        
        return $this->subject('New User')->view('admin_login_mail', compact('order'));
    }
}
