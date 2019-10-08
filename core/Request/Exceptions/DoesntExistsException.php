<?php

namespace Gomail\Request\Exceptions;

use Exception;

class DoesntExistsException extends Exception 
{
    /**
     * Show error message if passed params doesnt exists
     * 
     * @param $params mixed
     * 
     * @return string 
     */ 
    public function showMessage($params = [])
    {
        echo 'Passed params: ' . $params . ' doesnt exists ';
    }
}