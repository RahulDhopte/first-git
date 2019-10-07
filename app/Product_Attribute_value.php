<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Attribute_value extends Model
{
    protected $fillable = [
        'Value','created_by','product_attribute_id'
    ];
     protected $table = 'product_attributes_values';
      const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
    
    public function product()
    {
    	return $this->belongsToMany('App\Product');
    } 
}

