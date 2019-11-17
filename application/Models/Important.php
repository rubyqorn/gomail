<?php

namespace Application\Models;

use Gomail\Database\Model;

class Important extends Model 
{
    /**
     * Name of the table which will be using
     * in this model
     * 
     * @var string
     */ 
    protected $table = 'important';

    /**
     * Get all records from important table
     * 
     * @return array
     */ 
    public function getImportantMessages()
    {
        return $this->selectAll()->getAll();
    }
}