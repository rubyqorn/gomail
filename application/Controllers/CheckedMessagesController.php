<?php 

namespace Application\Controllers;

use Application\Models\Check;

class CheckedMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Check
     */ 
    protected $check;

    public function __construct()
    {
        parent::__construct();

        $this->check = new Check();
    }

    /**
     * Show page with checked messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Отмеченные';
        $authUser = $this->user->getAuthUser();
        $messages = $this->check->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Check();

        return $this->view->render('check', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search checked messages
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect('/checked/page/1');
        }

        $title = 'Поиск по отмеченным сообщениям';
        $searchContent = $this->check->searchContent($this->request);

        return $this->view->render('search-content', compact('searchContent', 'title'));
    }
}