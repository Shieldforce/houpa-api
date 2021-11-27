<?php

namespace App\Services\Products\Sizes;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class Edit
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["sizes"]) && count($request->json()->all()["sizes"]) > 0)
        {
            ValidationEditSizes::execute($request);
            foreach($request->json()->all()["sizes"] as $size)
            {
                ProductSize::updateOrcreate(
                    [
                        "name"        => $size["size"],
                        "product_id"   => $product->id,
                    ],
                    [
                        "name"        => $size["size"],
                        "product_id"   => $product->id,
                    ]
                );
            }
        }
    }
}
