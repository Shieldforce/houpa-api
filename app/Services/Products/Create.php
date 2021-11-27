<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Http\Request;

class Create implements CreateOrUpdate
{
    public static function execute(Request $request, $id=null) : Product {
        ValidationCreateProduct::execute($request);
        return Product::create($request->all());
    }
}
