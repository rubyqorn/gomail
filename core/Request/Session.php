<?php

namespace Gomail\Request;

use Gomail\Request\Exceptions\SessionExceptions;

class Session extends RequestManipulation
{
    /**
     * @var $name string 
     */ 
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Set the session 
     * 
     * @return \Gomail\Request\Session
     */ 
    public function set()
    {
        if (isset($this->name)) {
            $_SESSION[$this->name];
            return $this;
        }

        return SessionExceptions::doesntExists();
    }

    /**
     * Get session if exists
     * 
     * @return \Gomail\Request\Session
     */ 
    public function get()
    {
        if (isset($_SESSION[$this->name])) {
            $_SESSION[$this->name];
            return $this;
        }

        return SessionExceptions::doesntExists();
    }

    /**
     * Delete session if exists
     * 
     * @return \Gomail\Request\Session
     */ 
    public function delete()
    {
        if (isset($_SESSION[$this->name])) {
            unset($_SESSION[$this->name]);
        }

        return SessionExceptions::doesntExists();
    }
}