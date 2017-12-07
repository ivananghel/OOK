<?php

namespace App\Helpers;

use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator as ValidationFactory;

final class Validator extends Helper {

    public static function run($section, array $data = []){
        $rules = config("validations.{$section}");
        $validator = ValidationFactory::make($data, $rules);
        if($validator->fails()){
            throw new ValidationException($validator);
        }
        return true;
    }

}