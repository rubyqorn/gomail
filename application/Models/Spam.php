<?php

namespace Application\Models;

use Gomail\Database\Model;
use Gomail\Request\Request;
use Application\Models\User;

class Spam extends Model 
{
    /**
     * Name of the table which will be using
     * in this model
     * 
     * @var string
     */
    public $table = 'spamed';

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
     * Get all records from spam table
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }

    /**
     * Search messages which was checked like
     * spam
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