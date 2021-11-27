<?php

namespace App\Services\Products\Categories;

use App\Response\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationEditCategories
{
    public static function execute(Request $request)
    {
        $validation = Validator::make($request->json()->all(), [
            "categories"                => ["required"],
            "categories.*.id"           => ["required"],
        ]);

        if($validation->fails())
        {
            return Error::generic(
                $validation->errors(),
                messageErrors(2000, "Validação de campo não passou!!"),
                $request["routeType"]
            );
        }

        return true;
    }
}
