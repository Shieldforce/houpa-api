<?php

namespace App\Services\Products\Colors;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class Create
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["colors"]) && count($request->json()->all()["colors"]) > 0)
        {
            ValidationCreateColors::execute($request);
            foreach($request->json()->all()["colors"] as $color)
            {
                ProductColor::create([
                    "color"        => $color["color"],
                    "product_id"   => $product->id,
                ]);
            }
        }
    }
}
