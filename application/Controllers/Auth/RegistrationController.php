<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;

class RegistrationController extends Controller
{
    /**
     * Show registration form
     * 
     * @return bool
     */ 
    public function show()
    {
        $title = 'Регистрация';

        return $this->view->render('auth/registration', compact('title'));
    }

    public function registration()
    {
       if ($this->request->checkHttpMethod('GET')) {
           //
       } 
    }

}