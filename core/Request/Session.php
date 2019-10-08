<?php

namespace Gomail\Request;

class Session extends RequestManipulation
{
    /**
     * @var $name string 
     */ 
    private $name;

    /**
     * @var $value mixed 
     */ 
    private $value;

    /**
     * @var $session array 
     */ 
    private $session;

    public function __construct($name, $value)
    {
        parent::__construct();
        $this->name = $name;
        $this->value = $value;
        $this->session = $_SESSION[$this->name] = $this->value;
    }

    /**
     * Set the session 
     * 
     * @return \Gomail\Request\Session
     */ 
    public function set()
    {
        if (isset($this->session)) {
            $_SESSION[$this->name] = $this->value;
            return $this;
        }

        return $this->invalidArgumentsError->showMessage();
    }

    /**
     * Get session if exists
     * 
     * @return \Gomail\Request\Session
     */ 
    public function get()
    {
        if (isset($this->session)) {
            print $_SESSION[$this->name];
            return $this;
        }

        return $this->invalidArgumentsError->showMessage();
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
    }
}