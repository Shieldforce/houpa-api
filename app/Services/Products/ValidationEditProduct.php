<?php

namespace App\Services\Products;

use App\Response\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationEditProduct
{
    public static function execute(Request $request)
    {
        $validation = Validator::make($request->json()->all(), [
            "id"              => ["required"],
            "name"            => ["required"],
            "description"     => ["required"],
            "price"           => ["required"],
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
