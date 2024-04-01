<?php

use Src\Models\AccessToken;

if (!function_exists('requests')) {
    function requests(): stdClass|array
    {
        $data = $_POST + $_GET;

        return json_decode(json_encode($data));
    }
};

if (!function_exists('session')) {
    function session(array $data): void
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        foreach ($data as $indice => $value) {
            $_SESSION[$indice] = $value;
        };
    }
};

if (!function_exists('autenticate')) {
    function autenticate(?bool $redirect = null): bool
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        $token = isset($_SESSION['token']) ? $_SESSION['token'] : false;

        if ($token) {
            $accToken = new AccessToken();
            $accToken = $accToken->where('token', '=', $token)->last('user_id');

            return (isset($accToken->token) && $accToken->token == $token) ? true : false;
        };

        return $redirect ? header(route('/login', true), true, 302) : false;
    }
};

if (!function_exists('querys')) {
    function querys(string $query = ''): string
    {
        if (empty($query)) {
            $server = server();
            $getParam = isset($server->QUERY_STRING) ? '?' . $server->QUERY_STRING : '';
        } else {
            $getParam = isset($_GET[$query]) ? $_GET[$query] : '';

            $getParam = isset($_GET[$query]) ? $_GET[$query] : '';

            if (empty($getParam)) {
                $getParam = isset($_GET[strtoupper($query)]) ? $_GET[strtoupper($query)] : '';
            };
        };

        return $getParam;
    }
};

if (!function_exists('verifyMethod')) {
    function verifyMethod(int $error, ?string $method = null): void
    {
        $server = server();

        switch ($error) {
            case 500:
                $type = 'warning';
                $message = __(':method method not allowed', [':method' => $server->REQUEST_METHOD]);

                break;
        };

        if (!isset($method) || (isset($method) && $server->REQUEST_METHOD !== $method)) {
            abort($error, $message, $type);
        };
    }
};

if (!function_exists('urlBase')) {
    function urlBase(): string
    {
        $server = server();

        $project_path = env('PROJECT_PATH');
        $protocol = ((isset($server->HTTPS)) && ($server->HTTPS == 'on') ? 'https' : 'http');
        $host = $server->HTTP_HOST;

        return "{$protocol}://{$host}{$project_path}";
    }
};

if (!function_exists('abort')) {
    function abort(int|string $errorCode, string $message, string $type): void
    {
        loadHtml(__DIR__ . '/../../resources/layout', [
            'error' => $errorCode,
            'type' => $type,
            'message' => $message,
            'title' => $message,
        ]);
        exit;
    }
};
