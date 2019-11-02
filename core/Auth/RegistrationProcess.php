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
 
    /**
     * Register new user
     * 
     * @param $fields array
     * 
     * @return bool
     */ 
    public function registration($fields) 
    {
        if (!is_array($fields)) {
            return false;
        }

        $this->message = $this->validation($fields);
    
        if (isset($_SESSION['error'])) {
            return false;
        }

        return $this->user->registerUser($fields);
    }

}