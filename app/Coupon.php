<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code','created_by','percent_off','NO_of_use'
    ];
     protected $table = 'coupons';
      const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
}
