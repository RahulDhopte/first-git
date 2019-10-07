<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupons_used extends Model
{
    protected $fillable = [
        'user_id','order_id','coupon_id',
    ];
     protected $table = 'coupons_used';
      const CREATED_AT = 'created_date';
    
}
