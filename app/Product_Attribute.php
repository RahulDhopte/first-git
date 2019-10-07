<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Attribute extends Model
{
    protected $fillable = [
        'Name','created_by'
    ];
     protected $table = 'product_attributes';
      const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
     public function product_attribute_value()
    {
        return $this->hasMany('App\Product_Attribute_value','product_attribute_id', 'id');
    }
}
