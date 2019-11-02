<?php

namespace Gomail\Auth\Validator;

class TextFieldsValidator extends Validator
{
    /**
     * Check if field equal to regular expression pattern 
     * and not smaller than 3 or bigger than 120 symbols. 
     * And finally create a session with message.
     * 
     * @param $field string
     * 
     * @return string Return an error or success message
     */ 
    public function validate($field)
    {
        $field = htmlspecialchars($field);
        
        if (strlen($field )< 3 || strlen($field) > 120) {
            if (preg_match('#([0-9a-zA-Z]+)#', $field)) {
                return true;              
            }

            return $this->request->session('error', 'Fields doesnt have to be bigger than 120 or smaller than 3 symbols');
        }
    }
}