<?php
    require __DIR__ .'/../../bootstrap/bootstrap.php';

    header('Content-Type: application/json');

    $url_base = urlBase();

    if($_SERVER['REQUEST_METHOD'] == 'GET'):
        $data = ['success' => false, 'message' => 'Method Not Allowed'];
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
