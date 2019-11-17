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
        $messages = $this->spam->getSpamedMessages();
        
        return $this->view->render('spam', compact('title', 'messages'));
    }
}