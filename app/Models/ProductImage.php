<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
   
    protected $table = "products_images";

    protected $fillable = [
        'url',
        'main',
        "product_id",
    ];

    /**
     * Relations
     */

     public function product()
     {
         return $this->hasOne(\App\Models\Product::class, "id", "product_id");
     }

}
