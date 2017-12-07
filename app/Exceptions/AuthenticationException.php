<?php

namespace App\Exceptions;

use Exception;

/**
 * Class AuthenticationException
 * @package App\Exceptions
 */
class AuthenticationException extends Exception {

    /**
     * AuthenticationException constructor.
     * @param string $message
     */
    public function __construct($message = 'Incorrect credentials', $code = ''){
        parent::__construct($message, 401);
    }

}