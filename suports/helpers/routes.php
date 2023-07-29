<?php

if(!function_exists('routes')):
    /**
     * @since 1.2.0
     * 
     * @return array
     */
    function routes(): array
    {
        return [
            '/',
            '/admin/dashboard',
            '/admin/users',
            '/admin/gallery',
            '/admin/settings',
            '/admin/profile',
            '/politicas-de-privacidade',
            '/login'
        ];
    }
endif;
