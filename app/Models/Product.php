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

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class,
            "products_categories","product_id", "category_id");
    }

    public function sizes()
    {
        return $this->hasMany(\App\Models\ProductSize::class, "product_id", "id");
    }

    public function colors()
    {
        return $this->hasMany(\App\Models\ProductColor::class, "product_id", "id");
    }
}
