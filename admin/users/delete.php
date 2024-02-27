<?php

verifyMethod(500, 'POST');

use Src\Models\User;

$user = new User();
$requests = requests();

foreach ($requests->ids as $ID) {
    if ($ID == 1) {
        session([
            'message' => 'A remoção de usuários foi interrompida, tentiva de remoção de um usuário do sistema!',
            'type' => 'danger',
        ]);

        return header(route('/admin/users', true), true, 302);
    };

    $user->find($ID)->delete();
};

session([
    'message' => 'Usuário(s) removido(s) com sucesso!',
    'type' => 'success',
]);

return header(route('/admin/users', true), true, 302);
