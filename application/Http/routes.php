<?php

/**
 * Here you can register your routes which will be used in your 
 * web application. Also if you dont want to create custom controllers
 * you can use anonymous functions with $request argument. If you will 
 * use anonymous functions, just pass empty string instead of controller
 * name. You can use methods of $request argument because of its an object 
 * of \Gomail\Request\Request()
 */ 

$route->getMethod('/', 'HomeController@index');
$route->postMethod('login', 'Auth\LoginController@login');
$route->postMethod('register', 'Auth\RegisterController@register');