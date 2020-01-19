<?php

namespace Application\Models;

use Gomail\Database\Model;

class Box extends Model 
{
    /**
     * @var string
     */ 
    protected $table = 'box';
    
     /**
     * Get all items
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }

    /**
     * Push new record into box table
     * where contains all messages
     * 
     * @param array $message 
     * 
     * @return bool
     */ 
    public function insertMessage($message)
    {
        return $this->insert('title, content', '?,?', [
            $message['title'], $message['message']
        ]);
    }
    
    /*
     * Get last inserted id from redord
     *
     * @return int
    */ 
    public function getLastInsertedId()
    {
        return $this->lastInsertId();
    }
}