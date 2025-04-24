<?php

namespace App\Helper;

use Illuminate\Support\Facades\Validator;

class ValidationHelper{

    public static function validateRequest($request, $rules){

        $validator = Validator::make($request, $rules);

        if($validator->fails()){
            return ['error' => $validator->errors()];
        }

        return false;
    }
}
