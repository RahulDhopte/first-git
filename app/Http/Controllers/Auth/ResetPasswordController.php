<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class ResetPasswordController extends Controller
{
   

    public function index()
    {
        Mail::to('rahul.dhopte@neosofttech.com')->send(new SendMail());
    }
}
