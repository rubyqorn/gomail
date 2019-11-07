<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Logout action
     * 
     * @return bool
     */ 
    public function logout() 
    {
        if (isset($_COOKIE['login'])) {
            $this->request->cookie('login', '', '')->delete();
            return $this->request->redirect('/login');
        }
    }
}