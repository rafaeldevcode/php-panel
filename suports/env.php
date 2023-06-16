<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

if (! function_exists('env')):
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @return string
     */
    function env($key): string
    {
        if(isset($_ENV[$key])):
            $env = $_ENV[$key];
        else:
            $env = '';
        endif;

        return $env;
    }
endif;
