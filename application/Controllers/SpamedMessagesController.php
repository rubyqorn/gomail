<?php

namespace Application\Controllers;

class SpamedMessagesController extends Controller 
{
    /**
     * Show page with spamed messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Спам';
        
        return $this->view->render('spam', compact('title'));
    }
}