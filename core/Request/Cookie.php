<?php

namespace Gomail\Request;

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
        parent::__construct();
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
        return $this->invalidArgumentsException->showMessage();
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

        return $this->doesntExistsError->showMessage($this->name);
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