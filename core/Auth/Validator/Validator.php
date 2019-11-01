<?php

namespace Gomail\Auth\Validator;

use Gomail\Request\Request;

class Validator
{
    /**
     * Array with available fields
     * 
     * @var array 
     */ 
    protected $fieldsNames = [
        'name', 'surname', 'email', 'password',
        'country', 'city', 'message', 'title', 
        'search' 
    ];

    public function __construct()
    {
        $this->request = new Request;
    }

    /**
     * Get keys of POST array
     * 
     * @param $fields array
     * 
     * @return array
     */ 
    protected function getFieldsNames($fields)
    {
        return array_keys($fields);
    }

    /**
     * Check if in array contains passed field names
     * 
     * @param $fields array
     * 
     * @return array
     */ 
    protected function checkFieldNames($fields)
    {
        if (in_array($this->getFieldsNames($fields), $this->fieldsNames)) {
            return $fields;
        }
    }
}