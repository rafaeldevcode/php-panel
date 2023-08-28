<?php

require __DIR__.'/helpers/env.php';
require __DIR__.'/helpers/settings.php';
require __DIR__.'/helpers/requests.php';
require __DIR__.'/helpers/menus-admin.php';
require __DIR__.'/helpers/routes.php';

!defined('APP_VERSION') && define('APP_VERSION', '1.5.0');

if (! function_exists('asset')):
    /**
     * @since 1.0.0
     * 
     * @param string $route
     * @return void
     */
    function asset(string $path): void
    {
        $protocol = ((isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
        $host = $_SERVER['HTTP_HOST'];
        $project_path = env('PROJECT_PATH');
        $assets_path = env('ASSETS_PATH');

        $url = "{$protocol}://{$host}{$project_path}{$assets_path}/{$path}";

        echo $url;
    }
endif;

if (!function_exists('dd')):
    /**
     * @since 1.0.0
     * 
     * @return void
     */
    function dd(): void
    {
        echo '<pre>';
        array_map(function($x) {var_dump($x);}, func_get_args());
        die;
    }
endif;

if (!function_exists('loadHtml')):
    /**
     * @since 1.4.0
     * 
     * @param string $path
     * @param array $data
     * @return void
     */
    function loadHtml(string $path, array $data = []): void
    {
        extract($data);

        $path = substr($path, -4) == '.php' ? $path : "{$path}.php";

        require $path;
    }
endif;

if (!function_exists('path')):
    /**
     * @since 1.0.0
     * 
     * @return string
     */
    function path(): string
    {
        $project_path = env('PROJECT_PATH');

        if (($_SERVER['SERVER_NAME'] === 'localhost') ||
            ($_SERVER['SERVER_NAME'] === '127.0.0.1') ||
            ($_SERVER['SERVER_NAME'] === '0.0.0.0') ||
            ($_SERVER['SERVER_NAME'] == env('IP_ROOT'))
        ) :
            $path = $_SERVER['REQUEST_URI'];
        else :
            $path = $_SERVER['REQUEST_URI'];
        endif;

        $path = str_replace($project_path, '', $path);

        $path = explode('?', $path)[0];

        return rtrim($path, '/');
    }
endif;

!defined('SETTINGS') && define('SETTINGS', (array)getSiteSettings());
