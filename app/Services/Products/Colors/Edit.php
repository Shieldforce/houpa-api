<?php

namespace App\Services\Products\Colors;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class Edit
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["colors"]) && count($request->json()->all()["colors"]) > 0)
        {
            ValidationEditColors::execute($request);
            foreach($request->json()->all()["colors"] as $color)
            {
                ProductColor::updateOrcreate(
                    [
                        "color"        => $color["color"],
                        "product_id"   => $product->id,
                    ],
                    [
                        "color"        => $color["color"],
                        "product_id"   => $product->id,
                    ],
                );
            }
        }
    }
}
