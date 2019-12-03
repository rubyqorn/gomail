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
     * Redirect to the home page
     * 
     * @return \Gomail\Request\Request
     */ 
    public function index()
    {
        $this->checkIsUserAuth();

        if ($this->request->getCurrentUri() == '/') {
            return $this->request->redirect('messages/page/1');
        }

        return $this->request->redirect('login');
    }

    /**
     * Show home page
     * 
     * @return \Gomail\View\View
     * */ 
    public function box()
    {
        $this->checkIsUserAuth();

        $title = 'Почта';
        $messages = $this->message->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Message();
        $authUser = $this->user->getAuthUser();

        return $this->view->render('home', compact('title', 'authUser', 'messages', 'pagination'));
    }

    /**
     * Search messages 
     * 
     * @return \Gomail\View\View
     * */ 
    public function search()
    {
        if ($this->request->checkHttpMethod('POST')) {
            $title = 'Поиск по сообщениям';
            $searchContent = $this->message->searchMessages($this->request);

            return $this->view->render('search-content', compact('searchContent', 'title'));
        }   
        
        return $this->request->redirect('/messages/page/1');
    }
}