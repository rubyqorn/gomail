<?php

namespace Gomail\Auth\Validator;

class EmailFieldsValidator extends Validator
{
     /**
     * Check if field equal to regular expression pattern 
     * and create a session with message.
     * 
     * @param $field string
     * 
     * @return string Return an error or success message
     */ 
    public function validate($field)
    {
       if (preg_match("#([a-zA-Z0-9_-])@(gmail|email|yandex)\.(com|ru)#", $field)) {
            return $this->request->session('success', 'Fields validation went successfully');
       } 

       return $this->request->session('error', 'Email field have to be like your@gmail.com');
    }
}