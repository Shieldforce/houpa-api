<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
    protected $table = "products";

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    /**
     * Relations
     */

     public function images()
     {
         return $this->hasMany(\App\Models\ProductImage::class, "product_id", "id");
     }

}
