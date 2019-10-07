<?php

namespace App\frontendModel;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
      protected $fillable = [
        'order_id','product_id','quantity','amount', 
    ];
     protected $table = 'order_details';
      
}
