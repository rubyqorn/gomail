<?php 

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use Application\Models\User;

class LoginController extends Controller 
{
    /**
     * Show login form
     *
     * @return bool 
     */
    public function show()
    {
        $title = 'Войти';

        return $this->view->render('auth/login', compact('title'));
    }

    public function login()
    {
        if ($this->request->checkHttpMethod('POST')) {
            //
        }
    }
}