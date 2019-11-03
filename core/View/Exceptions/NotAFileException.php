<?php

namespace Gomail\View\Exceptions;

use Exception;

class NotAFileException extends Exception
{

    /**
     * Throw new exception if file is not a file
     * 
     * @param $message string
     * @param $code int
     * 
     * @return \Exception
     * */ 
    public function __construct($message, $code = 0)
    {
        return parent::__construct($message, $code);
    }
}