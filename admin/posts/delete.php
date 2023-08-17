<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\Posts;

verifyMethod(500, 'POST');

$post = new Posts;
$requests = requests();

foreach($requests->ids as $ID):
    $post->find($ID)->delete();
endforeach;

session([
    'message' => 'Post(s) removido(s) com sucesso!',
    'type'    => 'cm-success'
]);

return header('Location: /admin/posts', true, 302);
