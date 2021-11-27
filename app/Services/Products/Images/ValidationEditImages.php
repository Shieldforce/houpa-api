<?php

namespace App\Services\Products\Images;

use App\Response\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationEditImages
{
    public static function execute(Request $request)
    {
        $validation = Validator::make($request->json()->all(), [
            "imgs"            => ["required"],
            "imgs.*.url"      => ["required"],
            "imgs.*.main"     => ["required"],
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
