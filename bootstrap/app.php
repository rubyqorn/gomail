<?php

error_reporting(-1);

require_once './vendor/autoload.php';

use Gomail\App;

$app = new App();
$app->start();