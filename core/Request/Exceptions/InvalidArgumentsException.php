<?php

namespace Gomail\Request\Exceptions;

use Exception;

class InvalidArgumentsException extends Exception
{
    /**
     * Show error message if passed arguments is invalid
     * 
     * @return string 
     */ 
    public function showMessage()
    {
        echo 'Passed arguments is not valid ';
    }
}