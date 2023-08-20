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
            '/admin/posts',
            '/admin/gallery',
            '/admin/settings',
            '/admin/profile',
            '/policies',
            '/login'
        ];
    }
endif;

if(!function_exists('route')):
    /**
     * @since 1.4.0
     * 
     * @param string $path
     * @param bool $redirection
     * @return string|void
     */
    function route(string $path = '', bool $redirection = false)
    {
        $project_path = env('PROJECT_PATH');
        $path = $project_path . $path;

        if($redirection):
            return "Location: $path";
        endif;

        echo $path;
    }
endif;
