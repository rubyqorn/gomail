<?php 

namespace Application\Controllers;

class CheckedMessagesController extends Controller 
{
    /**
     * Show page with checked messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Отмеченные';

        return $this->view->render('check', compact('title'));
    }
}