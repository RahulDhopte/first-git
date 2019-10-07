<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
//use Auth;
use Socialite; 
use App\User;
use Kodeine\Acl\Models\Eloquent\User as KodeineUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

  
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        // dd($user->getNickname()); 
        $new_user = User::where('email',$user->getEmail())->first();
        if ( !$new_user ) {
           $new_user= User::create([
            'email' => $user->getEmail(),
            'username' => $user->getNickname(),
            'provider_id' =>$user->getId(),
        ]);
        }
        
        Auth::login($new_user, true);
        return redirect('index');
    }

        
      //  
    

/*        public function redirectTo(){
        
    // User role
    $role =  Auth::User()->getRoles(); 
    if (in_array('admin', $role) {
        return '/user/list';
     } 
     else
     {
        return '/user';
     }
   
        }*/
}
