<?php

namespace Gomail\Routing\Parser;

use Gomail\Request\Exceptions\InvalidArgumentsException;

class ParseParamsFromURL
{
    /**
     * Parse URL parameters 
     * 
     * @param $params string
     * 
     * @return string
     */ 
    public function parse(array $params)
    {
        if (count($params) == 3) {

            if (!$this->configFileHandler('./config/route_params.php')) {
                return false;
            }

            $routeParams = require './config/route_params.php';
            $keys = array_keys($routeParams);

            if (isset($params['2']) && in_array($params['2'], $keys)) {
               return $this->pushRegularExpression($routeParams[$params['2']], $params);
                
            }

        }

        unset($params);

    }

    /**
     * Get last element of url delete and insert
     * regular expression pattern
     * 
     * @param $pattern string
     * @param $url array
     * 
     * @return string 
     */ 
    protected function pushRegularExpression($pattern, $url)
    {
        $lastElement = array_pop($url);
        unset($lastElement);
        array_push($url, $pattern);
        return implode('/', $url);
    }

    /**
     * Check config file and return array with 
     * parameters
     * 
     * @param $fileName string
     * 
     * @return array
     */ 
    protected function configFileHandler($fileName)
    {
        if (file_exists($fileName)) {
            return require_once $fileName;  
        }
    }

}