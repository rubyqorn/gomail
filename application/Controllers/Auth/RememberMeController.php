<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;

class RememberMeController extends Controller
{
    /**
     * Check if the remember me button was clicked
     * 
     * @param $input string
     * 
     * @return bool
     */ 
    protected function isClickedButton($input)
    {
        if ($input == 'on') {
            return true;
        } 
    } 

    /**
     * Set cookie which stay user for 10 days in system
     * 
     * @return \Gomail\Request\Cookie
     */ 
    protected function setCookie()
    {
        return $this->request->cookie('login', $this->request->post()['email'], time() + 86400 * 10)->set();
    }

    /**
     * Remember user for 10 days
     * 
     * @param $input string 
     * 
     * @return \Gomail\Request\Cookie
     */ 
    public function rememberMe($input)
    {
        if ($this->isClickedButton($input)) {
            return $this->setCookie();
        }
    }
}