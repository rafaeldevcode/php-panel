<?php

    require __DIR__ .'/vendor/autoload.php';
    require __DIR__ . '/suports/helpers.php';

    $path = empty(path()) ? '/' : path();
    $routes = routes();

    if(strpos($path, '/admin') !== false && !isAuth()):
        if($path == '/login'):

            getHtml(__DIR__.$path.'/index');
        else:

            return header('Location: /login', true, 302);
        endif;
    else:
        if(in_array($path, $routes)):

            getHtml(__DIR__.path().'/index');
        else:

            getHtml(__DIR__.'/errors/index', [
                'error' => 404,
                'type' => 'danger',
                'message' => 'Not Found',
                'title' => 'Page Not Found'
            ]);
        endif;
    endif;
