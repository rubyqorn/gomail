<?php

namespace Application\Controllers;

use Application\Models\Spam;

class SpamedMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Spam
     */ 
    protected $spam;

    public function __construct()
    {
        parent::__construct();

        $this->spam = new Spam();
    }

    /**
     * Show page with spamed messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Спам';
        $authUser = $this->user->getAuthUser();
        $messages = $this->spam->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Spam();
        
        return $this->view->render('spam', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search spamed messages
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect('/spam/page/1');
        }

        $title = 'Поиск по заблокированным сообщениям';
        $searchContent = $this->spam->searchContent($this->request);

        return $this->view->render('search-content', compact('searchContent', 'title'));
    }
}