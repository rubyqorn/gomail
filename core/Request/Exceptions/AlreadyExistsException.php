<?php

namespace Gomail\Request\Exceptions;

use Exception;

class AlreadyExistsException extends Exception
{
    /**
     * Show error message if passed params already exists
     * 
     * @param $params mixed
     * 
     * @return string 
     */ 
    public function showMessage($params = [])
    {
        echo 'Passed params: ' . $params . ' already exists';
    }
}