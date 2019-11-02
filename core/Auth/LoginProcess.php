<?php

namespace Gomail\Auth;

use Application\Models\User;

class LoginProcess extends Authentificate
{
    protected $message;

    public function login($fields)
    {
        if (!is_array($fields)) {
            return false;
        }

        $this->message = $this->validation($fields);

        if (isset($_SESSION['error'])) {
            return false;
        }

        if ($this->user->loginUser($fields)) {
            return $this->cookie('login', "{$fields['email']}", time() + 86400 * 5)->set();
        }
        
    }
}