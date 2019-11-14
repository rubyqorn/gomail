<?php

namespace Gomail\Auth;

use Gomail\Request\Request;
use Application\Models\User;
use Gomail\Auth\Validator\TextFieldsValidator;
use Gomail\Auth\Validator\EmailFieldsValidator;

abstract class Authentificate extends Request
{
    /**
     * Contains a POST array with fields
     * 
     * @var array
     */ 
    protected $fields;

    /**
     * Contain an object of EmailFieldsValidator
     * or TextFieldsValidator 
     * 
     * 
     * @var \Gomail\Auth\Validator\EmailFieldsValidator 
     * or \Gomail\Auth\Validator\TextFieldsValidator object  
     */
    protected $validator = null;

    /**
     * @var \Application\Models\User
     */ 
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Get POST array with fields content
     * 
     * @return array
     */ 
    protected function getFields()
    {
        if (!empty($this->post())) {
            return $this->fields = $this->post();
        }
    }

    /**
     * Check field name and create needed object
     * 
     * @param $field string
     * 
     * @return \Gomail\Auth\Validator\EmailFieldsValidator
     *          \Gomail\Auth\Validator\TextFieldsValidator
     */ 
    protected function accessValidator($field)
    {
        if ($field == 'email') {
            return new EmailFieldsValidator();
        }

        return new TextFieldsValidator();
    }

    /**
     * Loop passed fields and call the method
     * of accessed validator
     *
     * @param $fields array
     * 
     * @return string Return an error or success message
     */ 
    protected function validatorHandler($fields)
    {
        foreach($fields as $fieldName => $value) {
            $this->validator = $this->accessValidator($fieldName);
            $this->validator->validate($value);
        }
    }

    /**
     * Clear sessions with error or success message
     * and call validator handler which loop passed
     * fields 
     * 
     * @param $fields array
     * 
     * @return string Return an error or success message
     */ 
    public function validation($fields)
    {
        $this->clearMessages('error');
        $this->clearMessages('success');
        return $this->validatorHandler($fields);
    }

    /**
     * Delete success or error messages
     * 
     * @param $name string
     * 
     * @return null
     */ 
    protected function clearMessages($name)
    {
        unset($_SESSION[$name]);
    }

}