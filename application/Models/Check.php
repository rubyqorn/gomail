<?php

namespace Application\Models;

use Gomail\Database\Model;
use Gomail\Request\Request;
use Application\Models\User;

class Check extends Model 
{
    /**
     * Name of the table which will be using
     * in this model
     * 
     * @var string
     */
    protected $table = 'checked';

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
     * Get all messages from table named checked
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }

    /**
     * Get checked records from 'checked' table
     * 
     * @param \Gomail\Request\Request $request
     * 
     * @return array
     */ 
    public function searchContent(Request $request)
    {
        $userId = $this->user->getAuthUser()['id'];
        return $this->search->search($request, $userId);
    }
}