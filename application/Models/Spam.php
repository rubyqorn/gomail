<?php

namespace Application\Models;

use Gomail\Database\Model;

class Spam extends Model 
{
    /**
     * Name of the table which will be using
     * in this model
     * 
     * @var string
     */
    protected $table = 'spamed';

    /**
     * Get all records from spam table
     * 
     * @return array
     */ 
    public function getSpamedMessages()
    {
        return $this->selectAll()->getAll();
    }
}