<?php

namespace Gomail\Request;

abstract class RequestManipulation
{
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