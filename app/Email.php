<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
     protected $table = 'email_template';
      protected $fillable = [
        'title','content','subject','created_by',
    ];
}
