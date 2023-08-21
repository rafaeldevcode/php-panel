<?php
    require __DIR__ .'/../bootstrap/bootstrap.php';

    $path = empty(path()) ? '/' : path();
    $routes = routes();

    if(strpos($path, '/admin') !== false && !autenticate()):
        if($path == '/login'):

            loadHtml(__DIR__.getFileName($path));
        else:

            return header(route('/login', true), true, 302);
        endif;
    else:
        if(in_array($path, $routes)):

            loadHtml(__DIR__.'/..'.getFileName($path));
        else:

            loadHtml(__DIR__.'/../resources/errors/index', [
                'error' => 404,
                'type' => 'danger',
                'message' => 'Not Found',
                'title' => 'Page Not Found'
            ]);
        endif;
    endif;
