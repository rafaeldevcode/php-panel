<?php

verifyMethod(500, 'POST');

use Src\Models\User;

$user = new User();
$requests = requests();
$currentPass = $user->find($requests->id)->data->password;

if (!empty($requests->password)) {
    if ($requests->password !== $requests->repeat_password || !password_verify($requests->current_password, $currentPass)) {
        session([
            'message' => __("The passwords don't match, try again!"),
            'type' => 'danger',
        ]);

        return header(route('/admin/profile', true), true, 302);
    };

    $user->update([
        'name' => $requests->name,
        'password' => password_hash($requests->password, PASSWORD_BCRYPT),
    ], $requests->id);

    session([
        'message' => __('User edited successfully!'),
        'type' => 'success',
    ]);

    return header(route('/admin/profile', true), true, 302);
} else {
    $user->update([
        'name' => $requests->name,
    ], $requests->id);

    session([
        'message' => __('User edited successfully!'),
        'type' => 'success',
    ]);

    return header(route('/admin/profile', true), true, 302);
};
