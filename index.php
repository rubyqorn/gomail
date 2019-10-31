<?php

require_once __DIR__ . '/bootstrap/app.php';

use Gomail\Auth\RegistrationProcess;

$reg = new RegistrationProcess();
$reg->registration($_POST);
?>

<form action="/" method="post">
    <p><input type="text" name="name">name</p>
    <p><input type="text" name="surname">surname</p>
    <p><input type="email" name="email">email</p>
    <p><input type="password" name="password">password</p>
    <button type="submit">send</button>
</form>