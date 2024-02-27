<?php
    verifyMethod(500, 'POST');

    use Src\Models\User;

    $user = new User();
    $requests = requests();
    $status = empty($requests->status) ? 'off' : $requests->status;

    if (!empty($requests->password)) {
        if ($requests->password !== $requests->repeat_password) {
            session([
                'message' => 'As senhas não conferem!',
                'type' => 'danger'
            ]);

            return header(route("/admin/users?method=edit&id={$requests->id}", true), true, 302);
        };

        $user->find($requests->id)->update([
            'name' => $requests->name,
            'email' => $requests->email,
            'status' => $status,
            'password' => password_hash($requests->password, PASSWORD_BCRYPT)
        ]);

    } else {
        $user->find($requests->id)->update([
            'name' => $requests->name,
            'email' => $requests->email,
            'status' => $status
        ]);
    };

    session([
        'message' => 'Usuário editado com sucesso!',
        'type' => 'success'
    ]);

    return header(route('/admin/users', true), true, 302);
