<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_img extends Model
{
   protected $fillable = [
        'Image','product_id','status','created_by'
    ];
    protected $table = 'product_images';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
}
