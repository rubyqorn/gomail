<?php

namespace Gomail\Routing\Parser;

use Gomail\Request\Exceptions\InvalidArgumentsException;

class ParseURL extends RouteParser
{
    private $url;

    /**
     * Parse url 
     * 
     * @param $params string
     * 
     * @return array 
     */ 
    public function parse(string $params) : array
    {
        $this->url = null;

        if (is_string($params)) {
            $this->url = $params;
            return explode('/', $this->url);
        }

        throw new InvalidArgumentException('Invalid argument passed into parse method of ParseURL class');
    }
}