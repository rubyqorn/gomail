<?php

namespace Gomail\Auth\Validator;

class EmailFieldsValidator extends Validator
{
    public function validate($field)
    {
       if (preg_match("#([a-zA-Z0-9_-])@(gmail|email|yandex)\.(com|ru)#", $field)) {
            return $field;
       } 

       die('The email which was passed doesnt equal to pattern');
    }
}