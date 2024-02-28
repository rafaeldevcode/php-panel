<?php

verifyMethod(500, 'POST');

use Src\Models\Posts;

$post = new Posts();
$requests = requests();

foreach ($requests->ids as $ID) {
    $post->find($ID)->delete();
}

session([
    'message' => __('Post(s) removed successfully!'),
    'type' => 'success',
]);

return header(route('/admin/posts', true), true, 302);
