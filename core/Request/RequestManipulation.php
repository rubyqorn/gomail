<?php

namespace Gomail\Request;

use Gomail\Request\Exceptions\{
    DoesntExistsException,
    InvalidArgumentsException,
    AlreadyExistsException
};

abstract class RequestManipulation
{
    /**
     * @var \Gomail\Request\Exceptions\AlreadyExistsException
     */ 
    protected $alreadyExistsError;

    /**
     * @var \Gomail\Request\Exceptions\DoesntExistsException 
     */ 
    protected $doesntExistsError;

    /**
     * @var \Gomail\Request\Exceptions\InvalidArgumentsException 
     */ 
    protected $invalidArgumentsError;

    public function __construct()
    {
        $this->alreadyExistsError = new AlreadyExistsException();
        $this->doesntExistsError = new DoesntExistsException();
        $this->invalidArgumentsError = new InvalidArgumentsException();
    }

    /**
     * Set cookie or session name
     * 
     * @param $name string
     * 
     * @return \Gomail\Request\Cookie
     * @return \Gomail\Request\Session
     */ 
    abstract public function set();

    /**
     * Get cookie or session name
     * 
     * @param $name string
     * 
     * @return \Gomail\Request\Cookie
     * @return \Gomail\Request\Session
     */ 
    abstract public function get();
    

    /**
     * Delete cookie or session name
     * 
     * @param $name string
     * 
     * @return \Gomail\Request\Cookie
     * @return \Gomail\Request\Session
     */ 
    abstract public function delete(); 

}