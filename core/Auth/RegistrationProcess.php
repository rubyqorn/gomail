<?php

namespace Gomail\Auth;

class RegistrationProcess extends Authentificate
{
    public function registration($fields) 
    {
        $this->validatorHandler($fields);
    }

}