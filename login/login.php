<?php

require __DIR__ .'/../vendor/autoload.php';
require __DIR__ . '/../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$data = $_POST;

$user = new User();
$login = $user->login($data['email'], $data['password']);

if($login['status']):
    session([
        'message'     => $login['message'],
        'type'        => 'cm-success',
        'token'       => $login['user']->token,
        'user_name'   => $login['user']->name,
        'user_id'     => $login['user']->id,
        'user_avatar' => $login['user']->avatar
    ]);

    return header('Location: /admin/dashboard', true, 302);
else:

    session([
        'message' => $login['message'],
        'type'    => 'cm-danger'
    ]);

    return header('Location: /login', true, 302);
endif;
