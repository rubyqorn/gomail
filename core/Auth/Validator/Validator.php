<?php

namespace Gomail\Auth\Validator;

class Validator
{
    protected $fieldsNames = [
        'name', 'surname', 'email', 'password',
        'country', 'city', 'message', 'title', 
        'search' 
    ];

    protected function getFieldsNames($fields)
    {
        return array_keys($fields);
    }

    protected function checkFieldNames($fields)
    {
        if (in_array($this->getFieldsNames($fields), $this->fieldsNames)) {
            return $fields;
        }
    }
}