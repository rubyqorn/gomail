<?php

namespace Application\Controllers;

use Gomail\Request\Request;
use Gomail\View\View;

class Controller 
{
    /**
     * @var \Gomail\Request\Request
     */ 
    protected $request;
    
    /**
     * @var \Gomail\View\View
     */ 
    protected $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
    }
}