<?php
    verifyMethod(500, 'POST');

    use Src\Models\User;

    $user = new User();
    $requests = requests();
    $current_pass = $user->find($requests->id)->data->password;

    if(!empty($requests->password)): // Check if the password field is not empty to update it
        if($requests->password !== $requests->repeat_password || !password_verify($requests->current_password, $current_pass)):
            session([
                'message' => 'As senhas não conferem!',
                'type' => 'cm-danger'
            ]);

            return header(route('/admin/profile', true), true, 302);
        endif;

        $user->update([
            'name' => $requests->name,
            'password' => password_hash($requests->password, PASSWORD_BCRYPT)
        ], $requests->id);

        session([
            'message' => 'Usuário editado com sucesso!',
            'type' => 'cm-success'
        ]);

        return header(route('/admin/profile', true), true, 302);
    else: // Update user without changing password
        $user->update([
            'name' => $requests->name
        ], $requests->id);

        session([
            'message' => 'Usuário editado com sucesso!',
            'type' => 'cm-success'
        ]);

        return header(route('/admin/profile', true), true, 302);
    endif;
