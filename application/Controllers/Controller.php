<?php

namespace Application\Controllers;

use Gomail\Request\Request;
use Gomail\View\View;
use Application\Models\User;

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

    /**
     * @var \Application\Models\User
     */ 
    protected $user;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
        $this->user = new User();
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
            $this->request->redirect('/login');
        }
    }
}