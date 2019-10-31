<?php

namespace Gomail\Auth;

use Gomail\Request\Request;
use Gomail\Auth\Validator\TextFieldsValidator;
use Gomail\Auth\Validator\EmailFieldsValidator;

abstract class Authentificate extends Request
{
    protected $fields;
    protected $validator;

    protected function getFields()
    {
        if (!empty($this->post())) {
            return $this->fields = $this->post();
        }
    }

    protected function accessValidator($field)
    {
        if ($field == 'email') {
            return new EmailFieldsValidator();
        }

        return new TextFieldsValidator();
    }

    protected function validatorHandler($fields)
    {
        foreach($fields as $fieldName => $value) {
            $this->validator = $this->accessValidator($fieldName);
            $this->validator->validate($value);
        }
    }
}