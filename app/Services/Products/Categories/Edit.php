<?php

namespace App\Services\Products\Categories;

use App\Models\Product;
use Illuminate\Http\Request;

class Edit
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["categories"]) && count($request->json()->all()["categories"]) > 0)
        {
            ValidationEditCategories::execute($request);
            $ids = array_column($request->json()->all()["categories"], "id");
            $product->categories()->sync($ids ?? [], true);
        }
    }
}
