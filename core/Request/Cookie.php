<?php

namespace Gomail\Request;

use Gomail\Request\Exceptions\{
    InvalidArgumentsException,
    DoesntExistsException
};

class Cookie extends RequestManipulation
{
    /**
     * @var string 
     */ 
    private $name;

    /**
     * @var string 
     */
    private $value;

    /**
     * @var date format 
     */ 
    private $time;

    /**
     * @var string
     */ 
    private $path;

    /**
     * @var string
     */ 
    private $domain;

    /**
     * @var bool
     */ 
    private $secure;

    /**
     * @var bool
     */ 
    private $httpOnly;

    /**
     * @var array
     */ 
    private $cookie;

    public function __construct(
        $name, $value, $time, $path = null, 
        $domain = null, $secure = FALSE, $httpOnly = FALSE
        )
    {
        $this->name = $name;
        $this->value = $value;
        $this->time = $time;
        $this->path = $path;
        $this->domain = $domain;
        $this->secure = $secure;
        $this->httpOnly = $httpOnly;
    }

    /**
     * Set the cookie
     * 
     * @return \Gomail\Request\Cookie
     */ 
    public function set()
    {
        if (setcookie($this->name, $this->value, $this->time, $this->path, $this->domain, $this->secure, $this->httpOnly)) {
            $this->cookie = $_COOKIE[$this->name] = $this->value;
            return $this;
        } 
        
        throw new InvalidArgumentsException('Invalid arguments was passed in Cookie constructor method');
    }

    /**
     * Get the cookie if exists
     * 
     * @return \Gomail\Request\Cookie
     */
    public function get()
    {
        if (isset($_COOKIE[$this->name])) {
            print $_COOKIE[$this->name];
            return $this;
        } 

        throw new DoesntExistsException('Cookie like ' . $this->name . ' doesn\'t exists');
    }

    /**
     * Delete cookie if exists
     * 
     * @return \Gomail\Request\Cookie 
     */ 
    public function delete()
    {
        if (isset($_COOKIE[$this->name])) {
            unset($_COOKIE[$this->name]);
            setcookie($this->name, '', time() - 3600);
        }
    }
}