<?php

namespace Gomail\Request;

class Request
{
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
     * 
     * @return \Gomail\Request\Session
     */ 
    public function session(string $name)
    {
        return new Session($name);
    }
}