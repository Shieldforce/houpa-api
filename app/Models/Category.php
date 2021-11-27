<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = "categories";

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Relations
     */

     public function products()
     {
         return $this->belongsToMany(\App\Models\Product::class,
             "products_categories","category_id", "product_id");
     }
}
