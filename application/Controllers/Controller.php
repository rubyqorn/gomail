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

    /**
     * Check if user have cookie named login
     * and redirect to current URI
     * 
     * @return bool
     */
    public function checkIsUserAuth()
    {
        if (!isset($_COOKIE['login'])) {
            return $this->request->redirect('/login');
        }
    }
}