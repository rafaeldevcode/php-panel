<?php

verifyMethod(500, 'POST');

use Src\Models\User;

$user = new User();

$user->find($_POST['id'])->update([
    'avatar' => $_POST['avatar'],
]);

session([
    'message' => 'Usuário editado com sucesso!',
    'type' => 'success',
    'user_avatar' => $_POST['avatar'],
]);

return header(route('/admin/profile', true), true, 302);
