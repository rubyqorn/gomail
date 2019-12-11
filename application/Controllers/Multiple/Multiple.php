<?php

namespace Application\Controllers\Multiple;

use Gomail\Database\Model;

interface Multiple
{
    /**
     * Call validation methods and call the method
     * which replace all records
     * 
     * @param $uri string
     * @param \Gomail\Database\Model $model
     * 
     * @return bool
     */ 
    public static function access(string $uri, Model $model);
}