<?php

namespace App\Exceptions;

use Exception;

/**
 * Class PermissionException
 * @package App\Exceptions
 */
class PermissionException extends Exception {

    /**
     * PermissionException constructor.
     * @param string $message
     */
    public function __construct($message = 'You don\'t have enough permissions'){
        parent::__construct($message, 403);
    }

}