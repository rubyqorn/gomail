<?php

namespace Application\Controllers\Single;

use Gomail\Database\Model;

interface Single
{
    /**
     * Access single record replacing
     * 
     * @param $uri string
     * @param \Gomail\Database\Model $model
     * 
     * @return \Gomail\Request\Session 
     */ 
    public static function access(string $uri, array $data, Model $model);
}