<?php

verifyMethod(500, 'POST');

use Src\Models\User;

$user = new User();
$requests = requests();

$user->find($requests->id)->update([
    'avatar' => isset($requests->avatar) ? $requests->avatar : null,
]);

session([
    'message' => __('User edited successfully!'),
    'type' => 'success',
    'user_avatar' => isset($requests->avatar) ? $requests->avatar : null,
]);

return header(route('/admin/profile', true), true, 302);
