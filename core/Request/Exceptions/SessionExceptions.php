<?php

namespace Gomail\Request\Exceptions;

use Exception;
use Gomail\Request\Exceptions\Interfaces\Exceptions;

class SessionExceptions extends Exception implements Exceptions
{
    public static function doesntExists()
    {

    }

    public static function alreadyExists()
    {

    }

    public static function invalidArguments()
    {

    }
}