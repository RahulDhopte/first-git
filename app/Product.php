<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'Name','sku','short_description','long_description','price','special_price','
        special_price_date','special_price_to','created_by', 'status','quantity','meta_title',
        'meta_description','meta_keywords','meta_status'
    ];
     protected $table = 'product';
      const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
    public function product_attribute()
    {
        return $this->hasMany('App\Product_Attribute_assoc','product_id');
    }
   /* public function value()
    {
       return $this->belongsToMany('App\Product_Attribute_value');
    }*/
    public function get_values()
    {
      return $this->belongsToMany('App\Product_Attribute_value', 'product_attributes_assoc', 
      'product_id', 'product_attribute_value_id');
    }
}
