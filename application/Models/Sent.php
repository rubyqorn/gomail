<?php

namespace Application\Models;

use Gomail\Database\Model;
use Application\Models\User;
use Gomail\Request\Request;

class Sent extends Model
{
    /**
     * Name of the table which will be using
     * in this model
     * 
     * @var string
     */
    public $table = 'sent';

    /**
     * @var \Application\Models\User
     */ 
    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();
    }

    /**
     * Get all records from sent table 
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }

    /**
     * Search records into sent table
     * 
     * @param \Gomail\Request\Request $request
     * 
     * @return array
     */ 
    public function searchContent(Request $request)
    {
        $id = $this->user->getAuthUser()['id'];
        return $this->search->search($request, $id);
    }

    /**
     * Get records for pagination
     * 
     * @param int $numberOfPage
     * @param int $perPage 
     * 
     * @return array
     */ 
    public function getRecordsForPagination($numberOfPage, $perPage)
    {
        $items = ($numberOfPage - 1) * $perPage;
        $userId = $this->getAuthUser()['id'];

        return $this->selectAll()->where(" who_sent = {$userId} ")
                    ->limit(" {$items},{$perPage} ")->getAll();
    }

    /**
     * Insert message into table
     * 
     * @param array $messageContent
     * @param int $recordId
     * 
     * @return array
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