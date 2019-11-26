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
        $messages = $this->check->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Check();

        return $this->view->render('check', compact('title', 'messages', 'pagination'));
    }
}