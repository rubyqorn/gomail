<?php

error_reporting(-1);
session_start();

require_once './vendor/autoload.php';

use Gomail\Routing\Route;
use Gomail\Request\Request;
use Gomail\App;

$request = new Request();
$route = new Route();

require_once './application/Http/routes.php';


$app = new App();
$app->start();

