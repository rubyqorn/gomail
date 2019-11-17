<?php

namespace Application\Controllers;

use Application\Models\Message;
use Application\Models\User;
use Application\Models\Test;

class HomeController extends Controller
{
    /**
     * @var \Application\Models\Message
     */ 
    protected $message;

    /**
     * @var \Application\Models\User
     */ 
    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->message = new Message();
        $this->user = new User();
    }

    /**
     * Show home page 
     * 
     * @return bool
     */ 
    public function index()
    {
        $this->checkIsUserAuth();
        $messages = $this->message->getMessages();
        $authUser = $this->user->getAuthUser();
        $title = 'Почта';
        
        $this->view->render('home', compact('title', 'messages', 'authUser'));
    }
}