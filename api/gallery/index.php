<?php
    require __DIR__ .'/../../bootstrap/bootstrap.php';

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
        $data = ['success' => false, 'message' => 'Method Not Allowed'];
    endif;

    echo json_encode($data);
