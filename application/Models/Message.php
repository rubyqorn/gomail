<?php

namespace Application\Models;

use Gomail\Database\Model;
use Gomail\Request\Request;

class Message extends Model
{
    public $table = 'messages';

    /**
     * @var \Application\Models\User
     */ 
    protected $user;

    /**
     * Containt the email of auth user
     * 
     * @var array
     */ 
    private $whoSendMessage;

    /**
     * Contain an id of user which was written in email
     * field
     * 
     * @var array
     */ 
    private $userId;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();
    }

    /**
     * Get messages which was sent for auth user
     * 
     * @return array
     */ 
    public function getMessages()
    {
        return $this->selectAll()->where(" whom_sent = '{$this->user->getAuthUser()['id']}' ")->getAll();
    }


    /**
     * Get user id whom was sent a message
     * 
     * @var $email string
     * 
     * @return array
     */ 
    protected function getUserWhomSendMessage($email)
    {
        return $this->user->getUser($email);
    }

    /**
     * Insert a message from message form
     * 
     * @param $messageContent array
     * 
     * @return bool
     */ 
    public function insertMessage($messageContent)
    {
        $this->whoSendMessage = $this->user->getAuthUser();
        $this->userId = $this->user->getUserId($messageContent['email']);

        return $this->insert('who_sent, whom_sent, title, content', '?,?,?,?', [
            $this->whoSendMessage['id'], $this->userId['id'], $messageContent['title'], $messageContent['message']
        ]);
    }

    /**
     * Get all records
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }

    /**
     * Search records into table by user pased character
     * 
     * @param \Gomail\Request\Request $request
     * 
     * @return array
     */ 
    public function searchMessages(Request $request)
    {
        $id = $this->user->getAuthUser()['id'];
        return $this->search->search($request, $id);
    }
}