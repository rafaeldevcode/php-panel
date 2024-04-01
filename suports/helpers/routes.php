<?php

if (!function_exists('routes')) {
    function routes(): array
    {
        return [
            '/',
            '/admin/dashboard',
            '/admin/users',
            '/admin/users/update',
            '/admin/users/create',
            '/admin/users/delete',
            '/admin/posts',
            '/admin/posts/create',
            '/admin/posts/update',
            '/admin/posts/delete',
            '/admin/gallery',
            '/admin/gallery/delete',
            '/admin/settings',
            '/admin/settings/update',
            '/admin/profile',
            '/admin/profile/update',
            '/admin/profile/update-avatar',
            '/policies',
            '/login',
            '/login/create',
            '/login/logout',
            '/api/gallery',
            '/api/gallery/create',
        ];
    }
};

if (!function_exists('route')) {
    function route(string $path = '', bool $redirection = false)
    {
        $projectPath = env('PROJECT_PATH');
        $path = $projectPath . $path;

        if ($redirection) {
            return "Location: $path";
        };

        echo $path;
    }
};

if (!function_exists('getFileName')) {
    function getFileName(string $path): string
    {
        $methodPosts = ['update', 'delete', 'create', 'update-avatar', 'logout'];
        $array = explode('/', $path);
        $count = count($array);
        $file = $array[$count - 1];
        $file = in_array($file, $methodPosts) ? $file : 'index';

        if (in_array($file, $methodPosts)) {
            unset($array[$count - 1]);
        }

        array_push($array, $file);

        $path = implode('/', $array);

        return $path;
    }
};
