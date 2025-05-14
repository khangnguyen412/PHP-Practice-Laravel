<?php

namespace App\Exceptions;

use Exception;

class TestException extends Exception
{
    //
    public function __construct($message = "User not found", $code = 404)
    {
        parent::__construct($message, $code);
    }
}
