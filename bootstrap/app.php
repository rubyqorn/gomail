<?php

error_reporting(-1);

session_start();

require_once './vendor/autoload.php';

use Gomail\App;

$app = new App();
$app->start();

?>

<form action="/" method="post">
    <p><input type="text" name="name"></p>
    <p><input type="email" name="email"></p>
    <p><button type="submit">send</button></p>
</form>