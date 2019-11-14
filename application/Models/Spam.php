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
}