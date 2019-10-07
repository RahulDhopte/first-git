<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Email;

class OrderStatusMail extends Mailable
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
       $arrData = [];
        $arrData['subject'] = Email::where('title','Status')->get();
        $arrData['userData'] = $this->data;
        $sub = Email::where('title','Status')->get();
        $search  = array("{order_id}","{status}");
        $replace = [$this->data['id'],$this->data['status']];

        $final_data = str_replace($search, $replace, $arrData['subject'][0]->content);
        //dd($final_data);
        //return $this->view('status_mail', compact('final_data'));
        return $this->subject($sub[0]['subject'])->view('status_mail', compact('final_data'));
    }
}
