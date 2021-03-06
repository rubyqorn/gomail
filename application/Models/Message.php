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

    /**
     * Pass id into SQL statement and get a record with 
     * the same id
     * 
     * @param int $id 
     * 
     * @return array
     */ 
    public function getMessageById($id)
    {
        $this->unsetQuery();
        return $this->selectRows(
            'messages.title, messages.content, messages.created_at, users.name, users.surname,
            users.image'
        )->join(
            'users', 'messages.whom_sent = users.id'
        )->and(
            'messages.message_id', "= {$id}"
        )->getOne();
    }

    /**
     * Get records five records for sidebar
     * 
     * @return array
     */ 
    public function getFirstFiveMessages()
    {
        $this->unsetQuery();
        return $this->selectRows('messages.title, messages.message_id, users.name, users.surname')->join('users', 'messages.whom_sent = users.id')->and('whom_sent', "= {$this->user->getAuthUser()['id']}")->limit(5)->getAll();
    }

     /*
     * Insert message into table
     *
     * @param array $messageContent
     * @param int $recordId
     *
     * @return bool
    */
    public function insertMessage($messageContent, $recordId)
    {
        $this->whoSendMessage = $this->user->getAuthUser();
        $this->userId = $this->user->getUserId($messageContent['email']);
        
        return $this->insert('message_id, whom_sent, who_sent, title, content', '?,?,?,?,?', [
           $recordId, $this->whoSendMessage['id'], $this->userId['id'], $messageContent['title'], $messageContent['message']  
        ]);
    }
}