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
}