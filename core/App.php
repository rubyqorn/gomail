<?php

namespace Gomail;

use Gomail\Routing\Route;
use Gomail\Database\Connector;

class App
{
    /**
     * Start routing in application
     * 
     * @return \Gomail\Routing\Route
     */ 
    public function start()
    {
       return new Route();
    }

    /**
     * Run database settings
     * 
     * @return \Gomail\Database\Connector
     */ 
    public function runDatabase()
    {
        return new Connector();
    }
   
}
