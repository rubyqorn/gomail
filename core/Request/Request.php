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
     * @var \Gomail\Request\Exceptions\AlreadyExistsException 
     */ 
    private $alreadyExistsError;

    /**
     * @var \Gomail\Request\Exceptions\DoesntExistsException 
     */ 
    private $doesntExistsError;

    /**
     * @var \Gomail\Request\Exceptions\InvalidArgumentsException 
     */ 
    private $invalidArgumentError;

    public function __construct()
    {
        $this->alreadyExistsError = new AlreadyExistsException();
        $this->doesntExistsError = new DoesntExistsException();
        $this->invalidArgumentError = new InvalidArgumentsException();
    }

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
    public function get() 
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
     * Get URI if its exists
     * 
     * @return string 
     */ 
    public function getUri()
    {
        $url = $this->get('url');

        if (isset($url)) {
            return $_SERVER['REQUEST_URI'];
        }

    }

    /**
     * Get full URL if its exists
     * 
     * @return string 
     */ 
    public function getFullUrl()
    {
        if ($this->getUri()) {
            return 'http://' . $_SERVER['HTTP_HOST']  . $this->getUri();
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
}