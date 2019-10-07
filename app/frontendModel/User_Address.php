<?php

namespace App\frontendModel;

use Illuminate\Database\Eloquent\Model;

class User_Address extends Model
{
      protected $fillable = [
        'user_id','address_1','address_2', 'city', 'state','country','zipcode',
    ];
     protected $table = 'user_address';
      
}
