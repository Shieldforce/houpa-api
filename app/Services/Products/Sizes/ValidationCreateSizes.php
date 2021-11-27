<?php

namespace App\Services\Products\Sizes;

use App\Response\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationCreateSizes
{
    public static function execute(Request $request)
    {
        $validation = Validator::make($request->json()->all(), [
            "sizes"           => ["required"],
            "sizes.*.size"    => ["required"],
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
