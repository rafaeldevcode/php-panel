<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/suports/helpers.php';

use Src\Models\Gallery;

header('Content-Type: application/json');

$url_base = urlBase();

if($_SERVER['REQUEST_METHOD'] == 'GET'):
    $requests = requests();
    $data = [[], []];
    $gallery = new Gallery();
    $images = !isset($requests->search) ? $gallery->paginate($requests->count) : $gallery->where('name', 'LIKE', "%{$requests->search}%")->paginate($requests->count);

    foreach($images->data as $image):
        array_push($data[0], [
            'file_path' => "{$url_base}/public/assets/images/{$image->file}",
            'id' => $image->id,
            'name' => $image->name
        ]);
    endforeach;

    array_push($data[1], ['next' => $images->next]);
else:
    $data = [];

    if(is_array($_FILES['images']['name'])):
        for($i = 0; $i < count($_FILES['images']['name']); $i++):
            if(!empty($_FILES['images']['name'][$i])):
                $image = saveImage('images', null, $i);

                array_push($data, [
                    'status' => true,
                    'file_path' => "{$url_base}/public/assets/images/{$image->file}",
                    'id' => $image->id,
                    'name' => $image->name
                ]);
            endif;
        endfor;
    else:
        $image = saveImage('images', null, null);

        array_push($data, [
            'status' => true,
            'file_path' => "{$url_base}/public/assets/images/{$image->file}",
            'id' => $image->id,
            'name' => $image->name
        ]);
    endif;
endif;

echo json_encode($data);
