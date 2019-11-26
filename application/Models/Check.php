<?php

namespace Application\Models;

use Gomail\Database\Model;

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
     * Get all messages from table named checked
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        return $this->selectAll()->getAll();
    }
}