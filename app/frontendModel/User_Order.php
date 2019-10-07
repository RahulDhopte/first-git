<?php

namespace App\frontendModel;

use Illuminate\Database\Eloquent\Model;

class User_Order extends Model
{
      protected $fillable = [
        'user_id','billing_address','shipping_address', 'Status','grand_total','shipping_charges','Discount','payment_gateway_id',
    ];
     protected $table = 'user_order';
      public function order()
    {
      return $this->hasMany('App\frontendModel\Order_Detail','order_id');
    /*return $this->belongsToMany('App\Product_img', 'order_details', 
      'order_id', 'product_attribute_value_id');*/
    }

    public function order_status()
    {
       return $this->belongsTo('App\frontendModel\User_Address','shipping_address_id');
    }
}
