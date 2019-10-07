<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
      protected $fillable = [
        'Name','Description', 'Image', 'created_by','status',
    ];
     protected $table = 'banners';
      const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
}
