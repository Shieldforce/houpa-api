<?php

namespace App\Services\Products\Images;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class Edit
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["imgs"]) && count($request->json()->all()["imgs"]) > 0)
        {
            ValidationEditImages::execute($request);
            $product->images()->delete();
            foreach($request->json()->all()["imgs"] as $img)
            {
                ProductImage::updateOrCreate(
                    [
                        "url"        => $img["url"],
                        "main"       => $img["main"],
                        "product_id" => $product->id,
                    ],
                    [
                        "url"        => $img["url"],
                        "main"       => $img["main"],
                        "product_id" => $product->id,
                    ]
                );
            }
        }
    }
}
