<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Email;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

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
        $arrData = [];
        $arrData['subject'] = Email::where('title','Login')->get();
        $sub = Email::where('title','Login')->get();
        //dd($sub);
        $arrData['userData'] = $this->data;

        $search  = array("{name}","{password}");
        $replace = [$this->data['name'],$this->data['password']];

        $final_data = str_replace($search, $replace, $arrData['subject'][0]->content);
        
        return $this->subject($sub[0]['subject'])->view('login_mail', compact('final_data'));
    }
}



