<?php

require __DIR__ . '/helpers/trans.php';
require __DIR__ . '/helpers/env.php';
require __DIR__ . '/helpers/settings.php';
require __DIR__ . '/helpers/requests.php';
require __DIR__ . '/helpers/menus-admin.php';
require __DIR__ . '/helpers/routes.php';

!defined('APP_VERSION') && define('APP_VERSION', '1.5.0');

if (!function_exists('asset')) {
    function asset(string $path, bool $return = false): ?string
    {
        $protocol = ((isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
        $host = $_SERVER['HTTP_HOST'];
        $project_path = env('PROJECT_PATH');
        $assets_path = env('ASSETS_PATH');

        $url = "{$protocol}://{$host}{$project_path}{$assets_path}/{$path}";

        if ($return) {
            return $url;
        } else {
            echo $url;

            return null;
        };
    }
};

if (!function_exists('dd')) {
    function dd(): void
    {
        echo '<pre>';
        array_map(function ($x) {var_dump($x);}, func_get_args());
        die;
    }
};

if (!function_exists('loadHtml')) {
    function loadHtml(string $path, array $data = []): void
    {
        extract($data);

        $path = substr($path, -4) == '.php' ? $path : "{$path}.php";

        require $path;
    }
};

if (!function_exists('path')) {
    function path(): string
    {
        $project_path = env('PROJECT_PATH');

        if (($_SERVER['SERVER_NAME'] === 'localhost') ||
            ($_SERVER['SERVER_NAME'] === '127.0.0.1') ||
            ($_SERVER['SERVER_NAME'] === '0.0.0.0') ||
            ($_SERVER['SERVER_NAME'] == env('IP_ROOT'))
        ) {
            $path = $_SERVER['REQUEST_URI'];
        } else {
            $path = $_SERVER['REQUEST_URI'];
        };

        $path = str_replace($project_path, '', $path);

        $path = explode('?', $path)[0];

        return rtrim($path, '/');
    }
};

if (!function_exists('getIconMessage')) {
    function getIconMessage(?string $type): string
    {
        $icon = 'bi bi-question-circle-fill';

        switch ($type) {
            case 'danger':
                $icon = 'bi bi-dash-circle-fill';

                break;
            case 'success':
                $icon = 'by bi-check-circle-fill';

                break;
            case 'warning':
                $icon = 'bi bi-exclamation-circle-fill';

                break;
            case 'secondary':
                $icon = 'bi bi-question-circle-fill';

                break;
            case 'info':
                $icon = 'bi bi-info-circle-fill';

                break;
        };

        return $icon;
    }
};

if (!function_exists('redirectIfTotalEqualsZero')) {
    function redirectIfTotalEqualsZero(string $class, string $route, string $message): bool
    {
        $class = new $class();

        if ($class->count() == 0) {
            session([
                'message' => $message,
                'type' => 'info',
            ]);

            header(route($route, true), true, 302);

            return true;
        };

        return false;
    }
};

if (!function_exists('getArraySelect')) {
    function getArraySelect(array $object, string $key, string $value): array
    {
        $data = [];

        foreach ($object as $object) {
            $data = $data + [$object->{$key} => $object->{$value}];
        };

        return $data;
    }
};

!defined('SETTINGS') && define('SETTINGS', getSiteSettings());
