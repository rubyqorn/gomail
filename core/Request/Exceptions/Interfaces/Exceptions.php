<?php

namespace Gomail\Request\Exceptions\Interfaces;

interface Exceptions
{
    public static function doesntExists();

    public static function alreadyExists();

    public static function invalidArguments();
}