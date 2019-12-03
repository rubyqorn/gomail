<?php

namespace Application\Controllers;

use Application\Models\Important;

class ImportantMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Important
     */
    protected $important;
 
    public function __construct()
    {
        parent::__construct();

        $this->important = new Important();
    }

    /**
     * Show page with important messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Важные';
        $authUser = $this->user->getAuthUser();
        $messages = $this->important->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Important();

        return $this->view->render('important', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search messages which checked like
     * important
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if ($this->request->checkHttpMethod('POST')) {
            $title = 'Поиск по важным сообщениям';
            $searchContent = $this->important->searchContent($this->request);

            return $this->view->render('search-content', compact('title', 'searchContent'));
        }

        return $this->request->redirect('/important/page/1');
    }
}