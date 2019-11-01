<?php

namespace Gomail\Auth;

class RegistrationProcess extends Authentificate
{
    /**
     * Text message
     * 
     * @var string
     */ 
    protected $message = null;
 
    public function registration($fields) 
    {
        $this->message = $this->validation($fields);
    }

}