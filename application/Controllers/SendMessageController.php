<?php

namespace Application\Controllers;

use Application\Models\Message;

class SendMessageController extends Controller
{
    /**
     * @var \Application\Models\Message
     * */ 
    protected $message;

    public function __construct()
    {
        parent::__construct();

        $this->message = new Message();
    }

    /**
     * Send a message and return a success or error
     * messages
     * 
     * @return \Gomail\Request\Session
     */ 
    public function send()
    {
        if (!empty($this->request->post())) {

            if ($this->message->insertMessage($this->request->post())) {
                $this->request->redirect('/');
                return $this->request->session('success', 'Сообщение отправлено');
            }

            $this->request->redirect('/');
            return $this->request->session('error', 'Ошибка отправления сообщения');
        
        }
    }
}