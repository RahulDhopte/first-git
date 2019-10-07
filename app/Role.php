<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	 protected $table = 'roles';
    
	public $timestamps = false;

	public function user_role()
    {
        return $this->hasOne('App\User_role','role_id');
    }
}
