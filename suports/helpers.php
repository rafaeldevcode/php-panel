<?php

require __DIR__ . '/helpers/trans.php';
require __DIR__ . '/helpers/env.php';
require __DIR__ . '/helpers/settings.php';
require __DIR__ . '/helpers/requests.php';
require __DIR__ . '/helpers/menus-admin.php';
require __DIR__ . '/helpers/routes.php';

!defined('APP_VERSION') && define('APP_VERSION', '1.5.0');

if (!function_exists('server')) {
    function server(?string $option = null): stdClass|string
    {
        $server = $_SERVER;

        if (isset($option)) {
            return isset($server[$option]) ? $server[$option] : null;
        }

        return json_decode(json_encode($server));
    }
};

if (!function_exists('asset')) {
    function asset(string $path, bool $return = false): ?string
    {
        $server = server();

        $protocol = ((isset($server->HTTPS)) && ($server->HTTPS == 'on') ? 'https' : 'http');
        $host = $server->HTTP_HOST;
        $projectPath = env('PROJECT_PATH');
        $assetsPath = env('ASSETS_PATH');

        $url = "{$protocol}://{$host}{$projectPath}{$assetsPath}/{$path}";

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
        $projectPath = env('PROJECT_PATH');
        $server = server();

        if (($server->SERVER_NAME === 'localhost') ||
            ($server->SERVER_NAME === '127.0.0.1') ||
            ($server->SERVER_NAME === '0.0.0.0') ||
            ($server->SERVER_NAME === env('IP_ROOT'))
        ) {
            $path = $server->REQUEST_URI;
        } else {
            $path = $server->REQUEST_URI;
        };

        $path = str_replace($projectPath, '', $path);

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
