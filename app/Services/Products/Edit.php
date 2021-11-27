<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Http\Request;

class Edit implements CreateOrUpdate
{
    public static function execute(Request $request, $id=null) : Product {
        ValidationEditProduct::execute($request);
        $item = Product::find($id);
        $item->update($request->all());
        return $item;
    }
}
