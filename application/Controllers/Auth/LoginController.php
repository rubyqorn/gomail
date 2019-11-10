<?php 

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use Gomail\Auth\LoginProcess;

class LoginController extends Controller 
{
    /**
     * @var \Gomail\Auth\LoginProcess
     */ 
    protected $process;

    public function __construct()
    {
        parent::__construct();

        $this->process = new LoginProcess();
    }

    /**
     * Show login form
     *
     * @return bool 
     */
    public function show()
    {
        $title = 'Войти';

        if(isset($_COOKIE['login'])) {
            return $this->request->redirect('/');
        }

        return $this->view->render('auth/login', compact('title'));
    }

    /**
     * User authentification
     * 
     * @return bool
     */ 
    public function login()
    {
        if ($this->request->checkHttpMethod('POST')) {
            if ($this->process->login($this->request->post())) {
                $this->request->redirect('/');
                return $this->request->session('success', 'Вы успешно вошли');
            }

            $this->request->redirect('/login');
            return $this->request->session('error', 'Неправильная почта или пароль');
        }
    }
}