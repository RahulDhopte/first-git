<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
	   protected $fillable = [
        'conf_key','conf_value', 'created_by', 'status'
    ];
     protected $table = 'configurations';
      const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
}	
