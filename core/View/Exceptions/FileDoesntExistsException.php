<?php

namespace Gomail\View\Exceptions;

use Exception;

class FileDoesntExistsException extends Exception
{
    /**
     * Throw new exception if file doesnt exists
     * 
     * @param $message string
     * @param $code int
     * 
     * @return \Exception
     * */ 
    public function __construct($message, $code)
    {
        return parent::__construct($message, $code);
    }
}