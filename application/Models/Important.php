<?php

namespace Application\Models;

use Gomail\Database\Model;
use Application\Models\User;
use Gomail\Request\Request;

class Important extends Model 
{
    /**
     * Name of the table which will be using
     * in this model
     * 
     * @var string
     */ 
    public $table = 'important';

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
     * Get all records from important table
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }

    /**
     * Search important messages into table
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