<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Email;

class OrderMail extends Mailable
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
        $arrData['subject'] = Email::where('title','Order')->get();
        $arrData['userData'] = $this->data;
        $sub = Email::where('title','Order')->get();
        $search  = array("{name}","{order_id}","{method}","{total}","{status}");
        $replace = [$this->data['name'],$this->data['id'],$this->data['method'],$this->data['total'],$this->data['status']];

        $final_data = str_replace($search, $replace, $arrData['subject'][0]->content);
        //dd($final_data);
        //return $this->view('order_mail', compact('final_data'));
        return $this->subject($sub[0]['subject'])->view('order_mail', compact('final_data'));
    }
}


                                                                                                                            