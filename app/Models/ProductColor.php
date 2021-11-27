<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{

    protected $table = "products_colors";

    protected $fillable = [
        'color',
        "product_id",
    ];

    /**
     * Relations
     */

    public function product()
    {
        return $this->hasOne(\App\Models\Product::class,"id", "product_id");
    }

}
