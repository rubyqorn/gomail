<?php 

namespace Gomail\Routing\Parser;

use Gomail\Request\Request;
use Gomail\Request\Exceptions\InvalidArgumentsException;

abstract class RouteParser 
{
    /**
     * @var \Gomail\Reques\Request 
     */ 
    protected $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    /**
     * Convert array to string
     * 
     * @param $arr array
     * 
     * @return string
     */ 
    public function arrayToString(array $arr) : string
    {
        if (is_array($arr)) {
            return implode('/', $arr);
        }

        throw new InvalidArgumentsException('Wrong parameters passed into arrayToString() of RouteParser class');
    }

    /**
     * Parse params which passed into method
     * 
     * @param $params string 
     */ 
    abstract protected function parse(string $params); 
}