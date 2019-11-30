<?php

namespace Application\Controllers;

use Application\Models\Message;
use Application\Models\User;

class HomeController extends Controller
{
    /**
     * @var \Application\Models\Message
     */ 
    protected $message;

    public function __construct()
    {
        parent::__construct();

        $this->message = new Message();
    }

    /**
     * Show home page 
     * 
     * @return bool
     */ 
    public function index()
    {
        $this->checkIsUserAuth();

        if ($this->request->getCurrentUri() == '/') {
            return $this->request->redirect('box/page/1');
        }

        return $this->request->redirect('login');
    }

    public function box()
    {
        $this->checkIsUserAuth();

        $title = 'Почта';
        $messages = $this->message->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Message();
        $authUser = $this->user->getAuthUser();

        return $this->view->render('home', compact('title', 'authUser', 'messages', 'pagination'));
    }
}