<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateOrUpdateProductService
{
    public static function execute(Request $request, $id=null) : Product
    {
        if($id)
        {
            $product = DB::transaction(function () use ($request, $id)
            {
                $product = Edit::execute($request, $id);
                \App\Services\Products\Images\Edit::execute($request, $product);
                \App\Services\Products\Colors\Edit::execute($request, $product);
                \App\Services\Products\Sizes\Edit::execute($request, $product);
                \App\Services\Products\Categories\Edit::execute($request, $product);
                return $product;
            });
            return $product;
        }
        else
        {
            $product = DB::transaction(function () use ($request)
            {
                $product = Create::execute($request);
                \App\Services\Products\Images\Create::execute($request, $product);
                \App\Services\Products\Colors\Create::execute($request, $product);
                \App\Services\Products\Sizes\Create::execute($request, $product);
                \App\Services\Products\Categories\Create::execute($request, $product);
                return $product;
            });
        }
        return $product;
    }
}
