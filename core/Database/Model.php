<?php

namespace Gomail\Database;

use Gomail\Database\Query\SQLManipulator;
use Gomail\Hasher\Password;
use Gomail\Hasher\Verifier;
use Gomail\Pagination\Pagination;

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
        $this->unsetQuery();
        return $this->selectAll()->limit("{$items},{$perPage}")->getAll();   
    }

}