<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
      protected $fillable = [
        'product_id','category_id'
    ];
    protected $table = 'product_categories';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
}
