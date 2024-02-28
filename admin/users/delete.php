<?php

verifyMethod(500, 'POST');

use Src\Models\User;

$user = new User();
$requests = requests();

foreach ($requests->ids as $ID) {
    if ($ID == 1) {
        session([
            'message' => __('User removal was interrupted, attempt to remove a user from the system!'),
            'type' => 'danger',
        ]);

        return header(route('/admin/users', true), true, 302);
    };

    $user->find($ID)->delete();
};

session([
    'message' => __('User(s) removed successfully!'),
    'type' => 'success',
]);

return header(route('/admin/users', true), true, 302);
