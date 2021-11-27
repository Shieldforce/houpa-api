<?php

namespace App\Services\Products\Sizes;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class Create
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["sizes"]) && count($request->json()->all()["sizes"]) > 0)
        {
            ValidationCreateSizes::execute($request);
            foreach($request->json()->all()["sizes"] as $size)
            {
                ProductSize::create([
                    "name"        => $size["size"],
                    "product_id"   => $product->id,
                ]);
            }
        }
    }
}
