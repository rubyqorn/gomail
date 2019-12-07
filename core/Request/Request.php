<?php

namespace Gomail\Request;

use Gomail\Request\Exceptions\{
    AlreadyExistsException,
    DoesntExistsException,
    InvalidArgumentsException
};

class Request
{
    /**
     * @var string 
     */ 
    protected $uriName;

    /**
     * Access cookie object 
     * 
     * @param $name string
     * @param $value string
     * @param $time pass the date
     * 
     * @return \Gomail\Request\Cookie
     */ 
    public function cookie(string $name, string $value, $time)
    {
        return new Cookie($name, $value, $time);
    }

    /**
     * Access session object
     * 
     * @param $name string
     * @param $value mixed
     * 
     * @return \Gomail\Request\Session
     */ 
    public function session(string $name, $value = [])
    {
        return new Session($name, $value);
    }

    /**
     * Create a wrapper for super global array $_GET
     * 
     * 
     * @return array
     */ 
    public function get($params = []) 
    {
        return $_GET;
    }

    /**
     * Create a wrapper for super global array $_POST
     * 
     * 
     * @return array 
     */ 
    public function post($params = [])
    { 
        return $_POST;
    }

    /**
     * Get current URI if its exists
     * 
     * @return string 
     */ 
    public function getCurrentUri()
    {
        $url = $this->get('url');

        if (isset($url)) {
            return $_SERVER['REQUEST_URI'];
        }

    }

    /**
     * Get previous URI name
     * 
     * @return string
    */
    public function getPreviousUri()
    {
        return substr($_SERVER['HTTP_REFERER'], 18);
    }

    /**
     * Set URI
     *  
     * @param $uri string
     * 
     * @return string
     */ 
    public function setUri($uri) 
    {
        return $this->uriName = $uri;
    }

    /**
     * Get URI
     * 
     * @return string 
     */ 
    public function getUri()
    {
        return $this->uriName;
    }

    /**
     * Get full URL if its exists
     * 
     * @return string 
     */ 
    public function getFullUrl()
    {
        if ($this->getUri()) {
            return 'http://' . $_SERVER['HTTP_HOST']  . $this->getCurrentUri();
        }

        return 'http://' . $_SERVER['HTTP_HOST'];
    }

    /**
     * Get HTTP method name
     * 
     * @return string 
     */ 
    public function getHttpMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Check if the HTTP method equal passed method
     * 
     * @param $method string
     * 
     * @return bool
     */ 
    public function checkHttpMethod($method)
    {
        if ($this->getHttpMethod() == $method) {
            return $method;
        } 
    }

    /**
     * Redirect a user to the passed url
     * 
     * @param $url string
     * 
     * @return mixed 
     */ 
    public function redirect(string $url)
    {
        if (is_string($url)) {
            return header('Location: ' . $url);
        }
    }

    /**
     * Show headers list
     * 
     * @return array 
     */ 
    public function showHeaders()
    {
        return headers_list();
    }

    /**
     * Show user name after authorization
     * 
     * @return string 
     */ 
    public function authUserName()
    {
        return $_SERVER['PHP_AUTH_USER'];
    }

    /**
     * Show user password after authorization
     * 
     * @return string 
     */ 
    public function authUserPassword()
    {
        return $_SERVER['PHP_AUTH_PW'];
    }

    /**
     * Convert array to string
     * 
     * @param $params array
     * @param $delimeter string
     * 
     * @return string
     */ 
    public function convertToString($delimeter, array $params) : string
    {
        return implode($delimeter, $params);
    }

    /**
     * Check if page is available
     * 
     * @return array
     */ 
    public function checkPageAvalibility()
    {
        return strstr($this->getCurrentUri(), 'page') ? explode('/', strstr($this->getCurrentUri(), 'page')) : [];
    }

    /**
     * Get page number if the page is available
     * 
     * @return int
     */ 
    public function getPageNumber()
    {
        return !empty($this->checkPageAvalibility()) ? $this->checkPageAvalibility()['1'] : die('Страница не задана');
    }

    /**
     * Set search link for correct searching
     * 
     * @return string
     */ 
    public static function setSearchLink()
    {
        $request = new self();
        $currentUri = $request->getCurrentUri();
        $currentUri = substr($currentUri, 0, -7);
        return $currentUri . '/search';
    }

    /**
     * Convert string to array
     * 
     * @param $params string
     * @param $delimeter string
     * 
     * @return array
     */ 
    public function convertToArray($delimeter, string $params) : array
    {
        return explode($delimeter, $params);
    }
}