<?php

require __DIR__ . '/../bootstrap/bootstrap.php';

verifyMethod(500, 'POST');

use Src\Models\User;

$requests = requests();

$user = new User();
$login = $user->login($requests->email, $requests->password);

if ($login['status']) {
    session([
        'message' => $login['message'],
        'type' => 'success',
        'token' => $login['user']->token,
        'user_name' => $login['user']->name,
        'user_id' => $login['user']->id,
        'user_avatar' => $login['user']->avatar,
    ]);

    return header(route('/admin/dashboard', true), true, 302);
} else {
    session([
        'message' => $login['message'],
        'type' => 'danger',
    ]);

    return header(route('/login', true), true, 302);
};
