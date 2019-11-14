<?php

namespace Application\Controllers;

use Application\Models\User;

class SettingsController extends Controller 
{
    /**
     * @var \Application\Models\User
     */ 
    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();
    }

    /**
     * Show page with user settings
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Настройки аккаунта';
        $settings = $this->user->getAuthUser();
        
        return $this->view->render('settings', compact('title', 'settings'));
    }

    /**
     * Update user settings
     * 
     * @return \Gomail\Request\Session
     */ 
    public function update()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect('/');
        }

        $this->user->updateUserSettings($this->request->post());

        if (!isset($_SESSION['error'])) {
            $this->request->redirect('/settings');
            return $this->request->session('success', 'Данные успешно обновлены');
        }

        $this->request->redirect('/settings');
        return $this->request->session('error', 'Проблема с обновлением данных');

    }
}