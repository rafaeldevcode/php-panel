<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/suports/helpers.php';

use Src\Models\User;

$user = new User();
$user = $user->find(8)->delete();

dd($user);
