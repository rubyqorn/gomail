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
        $messages = $this->sent->getSentMessages();

        return $this->view->render('sent', compact('title', 'messages'));
    }
}