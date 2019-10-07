<?php

namespace App\frontendModel;

use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
      protected $fillable = [
        'name','email','contact_no', 'message', 'note_admin','created_by',
    ];
     protected $table = 'contact_us';
      
}
