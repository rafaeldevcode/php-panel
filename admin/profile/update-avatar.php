<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

verifyMethod(500, 'POST');

$user = new User();
    
$user->update([
    'avatar' => $_POST['avatar']
], $_POST['id']);

session([
    'message'     => 'Usuário editado com sucesso!',
    'type'        => 'cm-success',
    'user_avatar' => $_POST['avatar']
]);

return header('Location: /admin/profile', true, 302);
