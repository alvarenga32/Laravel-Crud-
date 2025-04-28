<?php

namespace App\Helper;

use Illuminate\Support\Facades\Validator;

class ValidationHelper{

    public static function validateRequest($inputs, $rules){

        $validator = Validator::make($inputs, $rules);

        if($validator->fails()){
            return ['error' => $validator->errors()];
        }

        return false;
    }
}
