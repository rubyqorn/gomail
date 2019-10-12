<?php

namespace Gomail\Request\Exceptions;

use Exception;

class InvalidArgumentsException extends Exception
{
    /**
     * Throw new exception with own message
     * 
     * @return \Exception 
     */ 
    public function __construct($message, $code = null)
    {
        parent::__construct($message, $code = 0);
    }
}