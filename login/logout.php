<?php
    require __DIR__ .'/../bootstrap/bootstrap.php';

    verifyMethod(500, 'POST');
    autenticate();
    
    use Src\Models\User;

    $user_id = isset($_POST['id']) ? $_POST['id'] : null;
    $redirection = '/login';

    $user = new User();
    $user->logout($user_id);

    if (isset($user_id)) {
        session([
            'message' => 'Logout realizado com sucesso!',
            'type' => 'success'
        ]);

        $redirection = '/admin/users';
    };

    return header(route($redirection, true), true, 302);
