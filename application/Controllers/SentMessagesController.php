<?php

namespace Application\Controllers;

use Application\Models\Sent;

class SentMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Sent
     */ 
    protected $sent;

    public function __construct()
    {
        parent::__construct();

        $this->sent = new Sent();
    }

    /**
     * Show page with sent messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Отправленные';
        $authUser = $this->user->getAuthUser();
        $messages = $this->sent->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Sent();

        return $this->view->render('sent', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search sent messages
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect('/sent/page/1');
        }

        $title = 'Поиск по отправленным сообщениям';
        $searchContent = $this->sent->searchContent($this->request);

        return $this->view->render('search-content', compact('title', 'searchContent'));
    }
}