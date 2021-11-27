<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{

    protected $table = "products_sizes";

    protected $fillable = [
        'name',
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
