<?php

verifyMethod(500, 'POST');

use Src\Models\User;

$requests = requests();

if ($requests->password !== $requests->repeat_password) {
    session([
        'message' => __("The passwords don't match, try again!"),
        'type' => 'danger',
    ]);

    return header(route('/admin/users?method=create', true), true, 302);
} else {
    $password = password_hash($requests->password, PASSWORD_BCRYPT);
    $status = isset($requests->status) ? $requests->status : 'off';

    $user = new User();

    $user->create([
        'name' => $requests->name,
        'email' => $requests->email,
        'password' => $password,
        'status' => $status,
    ]);

    session([
        'message' => __('User added successfully!'),
        'type' => 'success',
    ]);

    return header(route('/admin/users', true), true, 302);
};
