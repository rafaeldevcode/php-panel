<?php

require __DIR__ .'/../vendor/autoload.php';
require __DIR__ . '/../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

if(!isAuth()):

    return header('Location: /login', true, 302);
else:
    $user_id = isset($_POST['id']) ? $_POST['id'] : null;
    $redirection = '/login';

    $user = new User();
    $user->logout($user_id);

    if(isset($user_id)):
        session([
            'message' => 'Logout realizado com sucesso!',
            'type' => 'cm-success'
        ]);

        $redirection = '/admin/users';
    endif;

    return header("Location: {$redirection}", true, 302);
endif;
