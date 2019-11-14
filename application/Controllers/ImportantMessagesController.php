<?php

namespace Application\Controllers;

class ImportantMessagesController extends Controller 
{
    /**
     * Show page with important messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Важные';

        return $this->view->render('important', compact('title'));
    }
}