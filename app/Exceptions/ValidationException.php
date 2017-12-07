<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\Validator;

/**
 * Class ValidationException
 * @package App\Exceptions
 */
class ValidationException extends Exception {

    /**
     * @var array
     */
    private $errors = [];

    /**
     * ValidationException constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator){
        parent::__construct('The given data has not passed the validation', 406);
        $this->errors = $validator->errors()->all();
    }

    /**
     * @return array
     */
    public function getErrors(){
        return $this->errors;
    }

}