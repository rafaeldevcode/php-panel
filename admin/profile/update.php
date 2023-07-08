<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$user = new User();
$current_pass = $user->find($_POST['id'])[0]['password'];

if(!empty($_POST['password'])): // Check if the password field is not empty to update it
    if($_POST['password'] !== $_POST['repeat_password'] || !password_verify($_POST['current_password'], $current_pass)):
        session([
            'message' => 'As senhas não conferem!',
            'type' => 'cm-danger'
        ]);

        return header("Location: /admin/profile", true, 302);
    endif;

    $user->update([
        'name' => $_POST['name'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ], $_POST['id']);

    session([
        'message' => 'Usuário editado com sucesso!',
        'type' => 'cm-success'
    ]);

    return header('Location: /admin/profile', true, 302);
else: // Update user without changing password
    $user->update([
        'name' => $_POST['name']
    ], $_POST['id']);

    session([
        'message' => 'Usuário editado com sucesso!',
        'type' => 'cm-success'
    ]);

    return header('Location: /admin/profile', true, 302);
endif;
