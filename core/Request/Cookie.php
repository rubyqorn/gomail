<?php

namespace Gomail\Request;

use Gomail\Request\Exceptions\CookieExceptions;

class Cookie extends RequestManipulation
{
    /**
     * @var $name string 
     */ 
    private $name;

    /**
     * @var $value string 
     */
    private $value;

    /**
     * $time date format 
     */ 
    private $time;

    public function __construct($name, $value, $time)
    {
        $this->name = $name;
        $this->value = $value;
        $this->time = $time;
    }

    /**
     * Set the cookie
     * 
     * @return \Gomail\Request\Cookie
     */ 
    public function set()
    {
        if (setcookie($this->name, $this->value, $this->time)) {
            return $this;
        } 
        return CookieExceptions::invalidArguments();
    }

    /**
     * Get the cookie if exists
     * 
     * @return \Gomail\Request\Cookie
     */
    public function get()
    {
        if (isset($_COOKIE[$this->name])) {
            $_COOKIE[$this->name];
            return $this;
        } 

        return CookieExceptions::doesntExists();
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
        }

        return CookieExceptions::doesntExists();
    }
}