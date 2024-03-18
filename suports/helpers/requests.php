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
            $acc_token = new AccessToken();
            $acc_token = $acc_token->where('token', '=', $token)->last('user_id');

            return (isset($acc_token->token) && $acc_token->token == $token) ? true : false;
        };

        return $redirect ? header(route('/login', true), true, 302) : false;
    }
};

if (!function_exists('querys')) {
    function querys(string $query = ''): string
    {
        if (empty($query)) {
            $get_parametro = isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
        } else {
            $get_parametro = isset($_GET[$query]) ? $_GET[$query] : '';

            $get_parametro = isset($_GET[$query]) ? $_GET[$query] : '';

            if (empty($get_parametro)) {
                $get_parametro = isset($_GET[strtoupper($query)]) ? $_GET[strtoupper($query)] : '';
            };
        };

        return $get_parametro;
    }
};

if (!function_exists('verifyMethod')) {
    function verifyMethod(int $error, string|null $method = null): void
    {
        switch ($error) {
            case 500:
                $type = 'warning';
                $message = __(':method method not allowed', [':method' => $_SERVER['REQUEST_METHOD']]);

                break;
        };

        if (!isset($method) || (isset($method) && $_SERVER['REQUEST_METHOD'] !== $method)) {
            abort($error, $message, $type);
        };
    }
};

if (!function_exists('urlBase')) {
    function urlBase(): string
    {
        $project_path = env('PROJECT_PATH');
        $protocol = ((isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
        $host = $_SERVER['HTTP_HOST'];

        return "{$protocol}://{$host}{$project_path}";
    }
};

if (!function_exists('abort')) {
    function abort(int|string $error_code, string $message, string $type): void
    {
        loadHtml(__DIR__ . '/../../resources/layout', [
            'error' => $error_code,
            'type' => $type,
            'message' => $message,
            'title' => $message,
        ]);
        exit;
    }
};
