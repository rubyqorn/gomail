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
$route->getMethod('login', 'Auth\LoginController@show');
$route->postMethod('auth', 'Auth\LoginController@login');
$route->getMethod('registration', 'Auth\RegistrationController@show');
$route->postMethod('register', 'Auth\RegistrationController@registration');
$route->postMethod('logout', 'Auth\LogoutController@logout');
$route->postMethod('send', 'SendMessageController@send');
$route->getMethod('check', 'CheckedMessagesController@show');
$route->getMethod('important', 'ImportantMessagesController@show');
$route->getMethod('sent', 'SentMessagesController@show');
$route->getMethod('spam', 'SpamedMessagesController@show');
$route->getMethod('settings', 'SettingsController@show');
$route->postMethod('settings/edit', 'SettingsController@update');