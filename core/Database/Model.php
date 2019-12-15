<?php

namespace Gomail\Database;

use Gomail\Database\Query\SQLManipulator;
use Gomail\Hasher\Password;
use Gomail\Hasher\Verifier;
use Gomail\Pagination\Pagination;
use Gomail\Searching\Search;
use Application\Models\User;

abstract class Model extends SQLManipulator
{
    /**
     * @var \Gomail\Hasher\Password
     */ 
    protected $hasher;

    /**
     * @var \Gomail\Hasher\Verifier 
     */ 
    protected $verifier;

    /**
     * @var \Gomail\Pagination\Pagination
     * */ 
    protected $paginator;

    /**
     * @var \Gomail\Searching\Search
     */ 
    protected $search;

    /**
     * Get all records from table
     * 
     * @return array
     */ 
    abstract protected function getAllItems();

    public function __construct()
    {
        parent::__construct();

        $this->hasher = new Password();
        $this->verifier = new Verifier();
        $this->paginator = new Pagination();
        $this->search = new Search();
    }

    /**
     * Call this method when the object look like string
     * 
     * @return string
     */ 
    public function __toString()
    {
        return (string) $this->pagination();
    }

    /**
     * Call the method of Pagination class which visualize 
     * buttons with links
     * 
     * @return string
     */ 
    public function pagination()
    {
        return $this->paginator->visualize($this->getAllItems(), 5);
    }

    /**
     * Get records for page pagination
     * 
     * @param $numberOfPage int
     * @param $perPage int
     * 
     * @return array
     */ 
    public function getRecordsForPagination($numberOfPage, $perPage)
    {
        $items = ($numberOfPage - 1) * $perPage;
        $user = new User;
        $userId = $user->getAuthUser()['id'];
        
        $this->unsetQuery();
        return $this->selectAll()->where(" whom_sent = '{$userId}' ")
                    ->limit("{$items},{$perPage}")->getAll();   
    }

    /**
     * Get checked records by ID 
     * 
     * @param $records array
     * @param \Gomail\Database\Model $model 
     * 
     * @return array
     */ 
    protected function getCheckedRecords($records)
    {
        foreach($records as $record) {
            $this->records[] = $this->selectAll()->where(" message_id = '{$record}' ")->getAll();
            $this->unsetQuery();
        }

        return $this->records;
    }

    /**
     * Replace all checked records into spam table
     * 
     * @param $data array
     * 
     * @return null 
     */ 
    // public function multipleReplacingInSpam($data)
    // {
    //     $records = $this->getCheckedRecords($data);

    //     foreach($records as $item) {
    //        $this->unsetQuery();
           
    //        foreach($item as $i) {
    //            $this->table = 'spamed';
    //            $this->insert('message_id, who_sent, whom_sent, title, content', '?,?,?,?,?', [
    //                 $i['message_id'], $i['who_sent'], $i['whom_sent'], $i['title'], $i['content']
    //            ]);
    //        }
    //     }
    // }

}