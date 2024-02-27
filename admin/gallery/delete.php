<?php

verifyMethod(500, 'POST');

use Src\Models\Gallery;

$gallery = new Gallery();

foreach (requests()->ids as $id) {
    $image = $gallery->find($id);

    isset($image->data) && deleteDir(__DIR__ . "/../../public/assets/images/{$image->data->file}");

    $image->posts()->detach($id);

    $image->delete();
};

session([
    'message' => 'Image(s) removida(s) com sucesso!',
    'type' => 'success',
]);

return header(route('/admin/gallery', true), true, 302);
