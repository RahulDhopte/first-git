<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($order_data)
    {
        $this->data = $order_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $order = $this->data;
        //dd($final_data);
        //return $this->view('order_mail', compact('final_data'));
        return $this->subject('New Order')->view('admin_order_mail', compact('order'));
    }
}
