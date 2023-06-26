<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$user = new User();

foreach($_POST['ids'] as $ID):
    if($ID == 1):
        session([
            'message' => 'A remoção de usuários foi interrompida, tentiva de remoção de um usuário do sistema!',
            'type'    => 'cm-danger'
        ]);
    
        return header('Location: /admin/users', true, 302);
    endif;

    $user->find($ID)->delete();
endforeach;

session([
    'message' => 'Usuário(s) removido(s) com sucesso!',
    'type'    => 'cm-success'
]);

return header('Location: /admin/users', true, 302);
