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

    // public function checkContainsOfRecords($records)
    // {
    //     $status = false;

    //     if (array_key_exists('spam', $records) || array_key_exists('select-all', $records)) {
    //         unset($records['spam'], $records['select-all']);
            
    //         foreach($records as $record) {
    //             $items = $this->selectAll()->where(" message_id = {$record} ")->getAll();
    //             $this->unsetQuery();

    //             $status = !empty($items) ? true : false;

    //             return $status;
                
    //         }
    //     }

        
    // }

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