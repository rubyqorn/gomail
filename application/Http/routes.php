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
$route->getMethod('messages/page/{page}', 'HomeController@box');
$route->getMethod('login', 'Auth\LoginController@show');
$route->postMethod('auth', 'Auth\LoginController@login');
$route->getMethod('registration', 'Auth\RegistrationController@show');
$route->postMethod('register', 'Auth\RegistrationController@registration');
$route->postMethod('logout', 'Auth\LogoutController@logout');
$route->postMethod('send', 'SendMessageController@send');
$route->getMethod('checked/page/{page}', 'CheckedMessagesController@show');
$route->getMethod('important/page/{page}', 'ImportantMessagesController@show');
$route->getMethod('sent/page/{page}', 'SentMessagesController@show');
$route->getMethod('spamed/page/{page}', 'SpamedMessagesController@show');
$route->getMethod('settings', 'SettingsController@show');
$route->postMethod('settings/edit', 'SettingsController@update');
$route->postMethod('messages/search', 'HomeController@search');
$route->postMethod('checked/search', 'CheckedMessagesController@search');
$route->postMethod('important/search', 'ImportantMessagesController@search');
$route->postMethod('sent/search', 'SentMessagesController@search');
$route->postMethod('spamed/search', 'SpamedMessagesController@search');
$route->postMethod('messages/replace', 'HomeController@replaceTo');
$route->postMethod('checked/replace', 'CheckedMessagesController@replaceInt');
$route->postMethod('important/replace', 'ImportantMessagesController@replaceInto');
$route->postMethod('sent/replace', 'SentMessagesController@replaceIntoTrash@replaceInto');
$route->postMethod('spamed/replace', 'SpamedMessagesController@replaceInto');
$route->postMethod('messages/replace-one', 'HomeController@replaceSingleRecord');
$route->postMethod('checked/replace-one', 'CheckedMessagesController@replaceSingleRecord');
$route->postMethod('important/replace-one', 'ImportantMessagesController@replaceSingleRecord');
$route->postMethod('sent/replace-one', 'SentMessagesController@replaceSingleRecord');
$route->postMethod('spamed/replace-one', 'SpamedMessagesController@replaceSingleRecord');
$route->getMethod('messages/message/{id}', 'HomeController@displaySingleRecord');
$route->postMethod('messages/message/{id}/send', 'SendMessageController@send');