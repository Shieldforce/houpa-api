<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Http\Request;

interface CreateOrUpdate
{
    public static function execute(Request $request, $id=null) : Product;
}
