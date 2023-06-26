<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$user = new User();
$status = empty($_POST['status']) ? 'off' : $_POST['status'];

if(!empty($_POST['password'])): // Verificar se o campo senha não esta vazio para atualiza-lo
    if($_POST['password'] !== $_POST['repeat_password']):
        session([
            'message' => 'As senhas não conferem!',
            'type'    => 'cm-danger'
        ]);

        return header("Location: /admin/users?method=edit&id={$_POST['id']}", true, 302);
    endif;

    $user->find($_POST['id'])->update([
        'name'     => $_POST['name'],
        'email'    => $_POST['email'],
        'status'   => $status,
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);

else: // Atualizar usuário sem alterar a senha
    
    $user->find($_POST['id'])->update([
        'name'   => $_POST['name'],
        'email'  => $_POST['email'],
        'status' => $status
    ]);
endif;

session([
    'message' => 'Usuário editado com sucesso!',
    'type'    => 'cm-success'
]);

return header('Location: /admin/users', true, 302);
