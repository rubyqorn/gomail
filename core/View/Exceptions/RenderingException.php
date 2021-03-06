<?php

namespace Gomail\View\Exceptions;

use Exception;

class RenderingException extends Exception
{
    /**
     * Throw new exception if have a problems 
     * with file rendering
     * 
     * @param @message string
     * @param $code int
     * 
     * @return \Exception
     * */ 
    public function __construct($message, $code = 0)
    {
        return parent::__construct($message, $code);
    }
}