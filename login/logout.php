<?php

require __DIR__ . '/../bootstrap/bootstrap.php';

verifyMethod(500, 'POST');
autenticate();

use Src\Models\User;

$requests = requests();
$user_id = isset($requests->id) ? $requests->id : null;
$redirection = '/login';

$user = new User();
$user->logout($user_id);

if (isset($user_id)) {
    session([
        'message' => __('Logout successful!'),
        'type' => 'success',
    ]);

    $redirection = '/admin/users';
};

return header(route($redirection, true), true, 302);
