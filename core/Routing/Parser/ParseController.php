<?php

namespace Gomail\Routing\Parser;

use Gomail\Request\Exceptions\InvalidArgumentsException;

class ParseController extends RouteParser
{
    /**
     * @var array 
     */ 
    private $controller;

    /**
     * Parse string with controller and method name
     * 
     * @param $params string
     * 
     * @return array 
     */ 
    public function parse(string $params)
    {
        $this->controller = null;

        if (is_string($params)) {
            $this->controller = $params;
            return explode('@', $this->controller);
        }

        throw new InvalidArgumentsException('Wrong parameters passed into parse() of ParseController class');
    }
}