<?php

namespace Application\Controllers;

class SentMessagesController extends Controller 
{
    /**
     * Show page with sent messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Отправленные';

        return $this->view->render('sent', compact('title'));
    }
}