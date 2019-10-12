<?php

namespace Gomail\Request\Exceptions;

use Exception;

class DoesntExistsException extends Exception 
{
    /**
     * Throw new exception with own message 
     * 
     * @return \Exception
     */ 
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}