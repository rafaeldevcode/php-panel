<?php

if (!function_exists('menusAdmin')) {
    function menusAdmin(): array
    {
        $menus = [
            'dashboard' => [
                'path' => '/admin/dashboard',
                'title' => __('Dashboard'),
                'icon' => 'bi bi-speedometer',
                'count' => null,
            ],
            'users' => [
                'path' => '/admin/users',
                'title' => __('Users'),
                'icon' => 'bi bi-people-fill',
                'count' => null,
            ],
            'posts' => [
                'path' => '/admin/posts',
                'title' => __('Posts'),
                'icon' => 'bi bi-pin-angle-fill',
                'count' => null,
            ],
            'gallery' => [
                'path' => '/admin/gallery',
                'title' => __('Gallery'),
                'icon' => 'bi bi-images',
                'count' => null,
            ],
            'settings' => [
                'path' => '/admin/settings',
                'title' => __('Settings'),
                'icon' => 'bi bi-gear-fill',
                'count' => null,
            ],
        ];

        return $menus;
    }
};
