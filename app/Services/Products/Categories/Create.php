<?php

namespace App\Services\Products\Categories;

use App\Models\Product;
use Illuminate\Http\Request;

class Create
{
    public static function execute(Request $request, Product $product)
    {
        if(isset($request->json()->all()["categories"]) && count($request->json()->all()["categories"]) > 0)
        {
            ValidationCreateCategories::execute($request);
            $ids = array_column($request->json()->all()["categories"], "id");
            $product->categories()->sync($ids ?? [], true);
        }
    }
}
