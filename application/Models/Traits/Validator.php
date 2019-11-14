<?php

namespace Application\Models\Traits;

use Gomail\Auth\Validator\Validator as BaseValidator;

trait Validator
{
    /**
     * @var \Gomail\Auth\Validator\Validator
     */ 
    protected $validator;

    /**
     * Create abstraction for validation method of 
     * Authentificate class
     * 
     * @return null
     */ 
    public function validation($fields)
    {
        $this->validator = new BaseValidator();

        $this->validator->validation($fields);
    }
}