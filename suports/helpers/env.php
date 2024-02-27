<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../../');
$dotenv->load();

if (! function_exists('env')) {
    function env($key): string
    {
        if (isset($_ENV[$key])) {
            $env = $_ENV[$key];
        } else {
            $env = '';
        };

        return $env;
    }
};
