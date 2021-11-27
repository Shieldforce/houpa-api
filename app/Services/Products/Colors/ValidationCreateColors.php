<?php

namespace App\Services\Products\Colors;

use App\Response\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationCreateColors
{
    public static function execute(Request $request)
    {
        $validation = Validator::make($request->json()->all(), [
            "colors"          => ["required"],
            "colors.*.color"  => ["required"],
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
