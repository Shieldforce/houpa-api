<?php

namespace App\Services\Products\Images;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class Create
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["imgs"]) && count($request->json()->all()["imgs"]) > 0)
        {
            ValidationCreateImages::execute($request);
            foreach($request->json()->all()["imgs"] as $img)
            {
                ProductImage::create([
                    "url"        => $img["url"],
                    "main"       => $img["main"],
                    "product_id" => $product->id,
                ]);
            }
        }
    }
}
