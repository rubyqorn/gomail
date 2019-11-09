<?php

namespace Gomail\Auth;

use Application\Models\User;
use Application\Controllers\Auth\RememberMeController;

class LoginProcess extends Authentificate
{
    /**
     * @var \Gomail\Request\Session
     */ 
    protected $message;

    /**
     * @var \Application\Controllers\Auth\RememberMeController
     */ 
    protected $remember;

    public function __construct()
    {
        parent::__construct();

        $this->remember = new RememberMeController();
    }

    /**
     * Remember user for 10 days
     * 
     * @param $input string
     * 
     * @return \Gomail\Request\Cookie
     */ 
    public function remember($input)
    {
        return $this->remember->rememberMe($input);
    }

    /**
     * Login user. Validate fields and return success or error
     * message. If error message doesnt exists call loginUser
     * method of User model and finally check if was clicked rememeber 
     * me button and create a login cookie
     * 
     * @param $fields array
     * 
     * @return \Gomail\Request\Cookie
     */ 
    public function login($fields)
    {
        if (!is_array($fields)) {
            return false;
        }

        $this->message = $this->validation($fields);

        if (isset($_SESSION['error'])) {
            return false;
        }

        if (!$this->user->loginUser($fields)) {
            return $this->session('error', 'Неправильная почта или пароль');
        }   

        if (!$this->remember($fields['check'])) {
            return $this->cookie('login', $this->post()['email'], time() + 86400)->set();
        }

        return $this->remember($fields['check']);
    }
}