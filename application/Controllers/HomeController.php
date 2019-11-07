<?php

namespace Application\Controllers;

class HomeController extends Controller
{
    /**
     * Show home page 
     * 
     * @return bool
     */ 
    public function index()
    {
        $title = 'Почта';

        $this->view->render('home', compact('title'));
    }
}