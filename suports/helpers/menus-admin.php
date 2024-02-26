<?php

if (!function_exists('menusAdmin')):
    function menusAdmin(): array
    {
        $menus = [
            'dashboard' => [
                'path' => '/admin/dashboard',
                'title' => 'Dashboard' ,
                'icon' => 'bi bi-speedometer',
                'count' => null      
            ],
            'users' => [
                'path' => '/admin/users',
                'title' => 'Usuários' ,
                'icon' => 'bi bi-people-fill',
                'count' => null
            ],
            'posts' => [
                'path'  => '/admin/posts',
                'title' => 'Posts' ,
                'icon'  => 'bi bi-pin-angle-fill',
                'count' => null
            ],
            'gallery' => [
                'path' => '/admin/gallery',
                'title' => 'Galeria',
                'icon' => 'bi bi-images',
                'count' => null
            ],
            'settings' => [
                'path' => '/admin/settings',
                'title' => 'Configurações',
                'icon' => 'bi bi-gear-fill',
                'count' => null
            ]
        ];

        return $menus;
    }
endif;
