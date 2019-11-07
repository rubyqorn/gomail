<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use Gomail\Auth\RegistrationProcess;

class RegistrationController extends Controller
{
    /**
     * @var \Gomail\Auth\RegistrationProcess 
     */ 
    protected $process;

    public function __construct()
    {
        parent::__construct();

        $this->process = new RegistrationProcess();
    }

    /**
     * Show registration form
     * 
     * @return bool
     */ 
    public function show()
    {
        $title = 'Регистрация';

        if(isset($_COOKIE['login'])) {
            return $this->request->redirect('/');
        }
        return $this->view->render('auth/registration', compact('title'));
    }

    /**
     * User registration
     * 
     * @return bool
     */ 
    public function registration()
    {  
        if ($this->request->checkHttpRequest('POST')) {

            if ($this->process->registration($this->request->post())) {
                $this->request->redirect('/login');
                return $this->request->session('success', 'Вы можете войти в свой аккаунт');
            }
    
            $this->request->redirect('/registration');
            return $this->request->session('error', 'Неправильно введены данные или пользователь уже существует');
        }
    }

}