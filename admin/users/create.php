<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$requests = requests();

if($requests->password !== $requests->repeat_password):
    session([
        'message' => 'As senhas não conferem, tente novamente!',
        'type' => 'cm-danger'
    ]);
    
    return header('Location: /admin/users?method=create', true, 302);
else:
    $password = password_hash($requests->password, PASSWORD_BCRYPT);
    $status = isset($requests->status) ? $requests->status : 'off';

    $user = new User();

    $user->create([
        'name' => $requests->name,
        'email' => $requests->email,
        'password' => $password,
        'status' => $status
    ]);

    session([
        'message' => 'Usuário adicionado com sucesso!',
        'type' => 'cm-success'
    ]);

    return header('Location: /admin/users', true, 302);
endif;
