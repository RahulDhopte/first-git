<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\User_role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\AdminUserMail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers  ;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' =>  ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try{
            if (isset($data['Subscribe'])) {
              

                 $post = json_encode(array(
                    "email_address"  => $data['email'],
                    "status" => "subscribed"
                ));

                 $email = $data['email'];
                // From URL to get webpage contents. 
                 $url = "https://us3.api.mailchimp.com/3.0/lists/83f03ee7ee/members"; 

                 $ch = curl_init();  

                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                 curl_setopt($ch, CURLOPT_URL, $url); 

                 curl_setopt($ch, CURLOPT_POST, 1);

                 curl_setopt($ch, CURLOPT_POSTFIELDS,
                    $post);

                 curl_setopt($ch, CURLOPT_USERPWD, "anystring:56a70b5caf7478b0bf1bc3e6dc34c2c9-us3");

                 $result = curl_exec($ch); 

             }

             
            
            //dd('some');
             $mail_data = array(
                'name' => $data['username'],
                'password' => $data['password']
             );
             //dd($data['email']);
             // $data['email'] = 'jaydeepmalaviya02@gmail.com';
             Mail::to($data['email'])->send(new SendMail($mail_data));
             Mail::to('rahul.dhopte@neosofttech.com')->send(new AdminUserMail($mail_data));
             return  User::create([
                'username' => $data['username'],
                'first_name' => $data['firstname'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status' =>'inactive'
            ]);
       
         }
         catch( Exception $e) {
            echo $e->getMessage();
        }
        die;
    }
}
















  // From URL to get webpage contents. 
               /*$url = "https://us3.api.mailchimp.com/3.0/lists"; 

                $ch = curl_init();  
 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                curl_setopt($ch, CURLOPT_URL, $url); 

        curl_setopt($ch, CURLOPT_USERPWD, "anystring:56a70b5caf7478b0bf1bc3e6dc34c2c9-us3");

                $result = curl_exec($ch); 

                 dd($result); 
                 die();*/