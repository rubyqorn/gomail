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
    protected $table = 'sent';

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
}