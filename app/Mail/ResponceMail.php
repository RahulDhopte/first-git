<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Email;

class ResponceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($responce_data)
    {
        $this->data = $responce_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $arrData = [];
        $arrData['subject'] = Email::where('title','Message')->get();
        $arrData['userData'] = $this->data;
        $sub = Email::where('title','Message')->get();
        $search  = array("{name}","{message}","{responce}");
        $replace = [$this->data['name'],$this->data['message'],$this->data['response']];

        $final_data = str_replace($search, $replace, $arrData['subject'][0]->content);
        //return $this->view('responce_mail', compact('final_data'));
        return $this->subject($sub[0]['subject'])->view('responce_mail', compact('final_data'));
    }
}
