<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

$user = new User();

$user->create($_POST);

session([
    'message' => 'Usuário adicionado com sucesso!',
    'type'    => 'cm-success'
]);

return header('Location: /admin/users', true, 302);
