<?php

require __DIR__ .'/../vendor/autoload.php';
require __DIR__ . '/../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

if(!isAuth()):

    return header('Location: /login', true, 302);
else:
    $data = $_POST;

    $user = new User();
    $user->logout();

    return header('Location: /login', true, 302);
endif;
