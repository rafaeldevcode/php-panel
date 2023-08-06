<?php

use Src\Models\Gallery;
use Src\Models\Posts;

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

verifyMethod(500, 'POST');

$requests = requests();
$post = new Posts();
$gallery = new Gallery();

$slug = normalizeSlug($requests->title, $requests->slug);

if(is_null($post->where('slug', '=', $slug)->first())):  
    $post = $post->create([
        'content' => $requests->content,
        'title' => $requests->title,
        'status' => $requests->status,
        'slug' => $slug,
        'user_id' => $_SESSION['user_id'],
        'thumbnail' => $requests->thumbnail
    ]);
    
    session([
        'message' => 'Post adicionado com sucesso!',
        'type'    => 'cm-success'
    ]);
    
    return header('Location: /admin/posts', true, 302);
else:
    session([
        'message' => 'A slug já está sendo utilizada, poo favor tente outra!',
        'type'    => 'cm-danger'
    ]);
    
    return header('Location: /admin/posts?method=create', true, 302);
endif;
