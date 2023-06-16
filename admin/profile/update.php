<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$user = new User();
$current_pass = $user->find($_POST['id'])[0]['password'];

if(!empty($_POST['password'])): // Verificar se o campo senha não esta vazio para atualiza-lo
    if($_POST['password'] !== $_POST['repeat_password'] || !password_verify($_POST['current_password'], $current_pass)):
        session([
            'message' => 'As senhas não conferem!',
            'type'    => 'cm-danger'
        ]);

        return header("Location: /admin/profile", true, 302);
    endif;

    $user->update([
        'name'     => $_POST['name'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ], $_POST['id']);

    session([
        'message' => 'Usuário editado com sucesso!',
        'type'    => 'cm-success'
    ]);

    return header('Location: /admin/profile', true, 302);
else: // Atualizar usuário sem alterar a senha
    $user->update([
        'name' => $_POST['name']
    ], $_POST['id']);

    session([
        'message' => 'Usuário editado com sucesso!',
        'type'    => 'cm-success'
    ]);

    return header('Location: /admin/profile', true, 302);
endif;
