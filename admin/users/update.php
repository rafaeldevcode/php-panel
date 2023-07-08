<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$user = new User();
$requests = requests();
$status = empty($requests->status) ? 'off' : $requests->status;

if(!empty($requests->password)): // Verificar se o campo senha não esta vazio para atualiza-lo
    if($requests->password !== $requests->repeat_password):
        session([
            'message' => 'As senhas não conferem!',
            'type' => 'cm-danger'
        ]);

        return header("Location: /admin/users?method=edit&id={$requests->id}", true, 302);
    endif;

    $user->find($requests->id)->update([
        'name' => $requests->name,
        'email' => $requests->email,
        'status' => $status,
        'password' => password_hash($requests->password, PASSWORD_BCRYPT)
    ]);

else: // Atualizar usuário sem alterar a senha
    
    $user->find($requests->id)->update([
        'name' => $requests->name,
        'email' => $requests->email,
        'status' => $status
    ]);
endif;

session([
    'message' => 'Usuário editado com sucesso!',
    'type' => 'cm-success'
]);

return header('Location: /admin/users', true, 302);
