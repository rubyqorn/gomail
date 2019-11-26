<?php

namespace Application\Models;

use Gomail\Database\Model;

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
     * Get all records from sent table 
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }
}