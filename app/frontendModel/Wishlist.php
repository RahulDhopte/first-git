<?php

namespace App\frontendModel;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
      protected $fillable = [
        'user_id','product_id' 
    ];
     protected $table = 'whislist';
      
        public function wish()
    {
      return $this->hasMany('App\Product_img','product_id','product_id');
  }
}