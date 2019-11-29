<?php

namespace Gomail\Searching\Validation;

use Gomail\Auth\Authentificate;
use Gomail\Request\Exceptions\InvalidArgumentException;

class Validator
{
    /**
     * @var array
     */ 
    protected $fieldNames;

    /**
     * Validate field name for its name was search
     * 
     * @param $fields array
     * 
     * @return array
     */ 
    protected function checkFieldNames(array $fields)
    {
        if (!is_array($fields)) {
            throw new InvalidArgumentsException();
        }

        $this->fieldNames = array_keys($fields);

        if (in_array('search', $this->fieldNames)) {
            return $fields;
        }
    }

    /**
     * Check size of request string
     * 
     * @param $field string
     * 
     * @return string
     */ 
    protected function checkRequestSize(string $field)
    {
        if (strlen($field) < 2 || strlen($field) > 30) {
            return false;
        }

        return $field;
    }

    /**
     * Validate fields for the name of field was search and 
     * the size was not bigger than 30 and smaller than 2
     * 
     * @param $fields array
     * 
     * @return array
     */ 
    public function fieldsValidation($fields)
    {
        if ($this->checkFieldNames($fields) && $this->checkRequestSize($fields['search'])) {
            return $fields;
        }

        return false;        
    }
}