<?php

namespace Gomail\Routing;

use Gomail\Request\Request;
use Gomail\Routing\Parser\{
    ParseController,
    ParseParamsFromURL,
    ParseURL
};

class Route extends Request
{
    /**
     * @var string 
     */ 
    protected $url;

    /**
     * @var string 
     */ 
    private $controller;

    /**
     * @var string 
     */ 
    private $method;

    /**
     * @var array 
     */ 
    private $params = [];

    /**
     * @var \Gomail\Routing\Parser\ParseURL 
     */ 
    private $parseUrl;

    /**
     * @var \Gomail\Routing\Parser\ParseController 
     */ 
    private $parseController;

    /**
     * @var \Gomail\Routing\Parser\ParseParamsFromURL 
     */ 
    private $parseParams;

    public function __construct()
    {
        $this->parseUrl = new ParseURL();
        $this->parseController = new ParseController();
        $this->parseParams = new ParseParamsFromURL();
    }

    /**
     * Match two arguments
     * 
     * @param $urlFromFile string
     * @param $urlFromQueryString string
     * 
     * @return string 
     */ 
    public function match(string $urlFromFile, string $urlFromQueryString)
    {
        $this->url = null;

        if (preg_match($urlFromFile, $urlFromQueryString)) {
            return $this->url = $urlFromQueryString;
        }
    }

    /**
     * URL params processing
     * 
     * @param $url string 
     * 
     * @return string
     */ 
    public function paramsHandler($url) 
    {
        $parsedUrl = $this->convertToArray('/', $url);
        return $this->parseParams->parse($parsedUrl);
    }

    /**
     * Check if URL equal main page and call
     * its method
     * 
     * @param $url string
     * @param $controller string
     * 
     * @return callback
     * */ 
    public function isUrlEqualMainPage(string $url, string $controller)
    {
        if ($this->getCurrentUri() == $url) {
            $parsedController = $this->parseController->parse($controller);
            $controller = '\Application\Controllers\\' . $parsedController['0'];
            $this->controller = new $controller;
            $this->method = $parsedController['1'];
            return call_user_func([$this->controller, $this->method]);
        }
    }

    /**
     * Call method of class if route doesnt have a parameters
     * 
     * @param $currentUrl string
     * @param $parsedController array
     * @param $callback callable
     * 
     * @return object 
     */ 
    protected function routeWithParams($currentUrl, $parsedController, $callback = null)
    {
        if (is_callable($callback)) {
            return call_user_func($callback);
        }

        $currentUrl = $this->convertToArray('/', $currentUrl);

        $controller = '\Application\Controllers\\' . $parsedController['0'];
        $this->controller = new $controller;
        $this->method = $parsedController['1'];
        $this->params = $currentUrl['2'] ? [$currentUrl['2']] : [];
        return call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Call method of class if route have an paramameters
     * 
     * @param $parsedController array
     * @param $callback callable
     * 
     * @return object
     */ 
    protected function routeWithoutParams($parsedController, $callback = null)
    {
        if (is_callable($callback)) {
            return call_user_func($callback);
        }
        $controller = '\Application\Controllers\\' . $parsedController['0'];
        $this->controller = new $controller;
        $this->method = $parsedController['1'];
        return call_user_func([$this->controller, $this->method]);
    }

    /**
     * Register new router
     * 
     * @param $method string
     * @param $url string
     * @param $controller string
     * @param $callback callable
     * 
     * @return object 
     */ 
    protected function registerRoute(string $method, string $url, string $controller, callable $callback = null)
    {
        if ($url == '/' || $this->getCurrentUri() == null) {
            return $this->isUrlEqualMainPage($url, $controller);
        }

        if ($this->match('#'. $this->paramsHandler($url) .'#', $this->getCurrentUri())) {
            $currentUrl = substr($this->getCurrentUri(), 1);
            $parsedController = $this->parseController->parse($controller);
            $urlLikeArray = $this->convertToArray('/', $url);
    
            if ($url == $currentUrl) {
                return $this->routeWithoutParams($parsedController, $callback);
            }
    
            if(count($urlLikeArray) == 3) {  
                return $this->routeWithParams($currentUrl, $parsedController, $callback);
            }
        }
        
    }

    /**
     * Create a route with GET HTTP method
     * 
     * @param $url string
     * @param $controller string
     * @param $callback callable
     * 
     * @return object  
     */ 
    public function getMethod(string $url, string $controller, callable $callback = null)
    {
        return $this->registerRoute('GET', $url, $controller, $callback);
       
    }

     /**
     * Create a route with POST HTTP method
     * 
     * @param $url string
     * @param $controller string
     * @param $callback callable
     * 
     * @return object  
     */ 
    public function postMethod(string $url, string $controller, callable $callback = null)
    {
        return $this->registerRoute('POST', $url, $controller, $callback);
    }

     /**
     * Create a route with PUT HTTP method
     * 
     * @param $url string
     * @param $controller string
     * @param $callback callable
     * 
     * @return object  
     */ 
    public function putMethod(string $url, string $controller, callable $callback = null)
    {
        return $this->registerRoute('PUT', $url, $controller, $callback);
    }

     /**
     * Create a route with DELETE HTTP method
     * 
     * @param $url string
     * @param $controller string
     * @param $callback callable
     * 
     * @return object  
     */ 
    public function deleteMethod(string $url, string $controller, callable $callback = null)
    {
        return $this->registerRoute('DELETE', $url, $controller, $callback);
    }   
}