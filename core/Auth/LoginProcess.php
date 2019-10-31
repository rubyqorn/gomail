<?php

namespace Gomail\Auth;

class LoginProcess extends Authentificate
{
    public function login($fields)
    {
        $this->validatorHandler($fields);
    }
}