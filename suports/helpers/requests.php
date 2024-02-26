<?php

use Src\Models\AccessToken;

if (! function_exists('requests')):
    function requests(): stdClass|array
    {
        $data = $_POST+$_GET;

        return json_decode(json_encode($data));
    }
endif;

if (!function_exists('session')):
    function session(array $data): void
    {
        if(!isset($_SESSION)):
            session_start();
        endif;

        foreach($data as $indice => $value):
            $_SESSION[$indice] = $value;
        endforeach;
    }
endif;

if (!function_exists('autenticate')):
    function autenticate(?bool $redirect = null): bool
    {
        if(!isset($_SESSION)):
            session_start();
        endif;

        $token = isset($_SESSION['token']) ? $_SESSION['token'] : false;

        if($token):
            $acc_token = new AccessToken();
            $acc_token = $acc_token->where('token', '=', $token)->last('user_id');
    
            return (isset($acc_token->token) && $acc_token->token == $token) ? true : false;
        endif;

        return $redirect ? header(route('/login', true), true, 302) : false;
    }
endif;

if (!function_exists('querys')):
    function querys(string $query = ''): string
    {
        if (empty($query)) :
            $get_parametro = isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
        else :
            $get_parametro = isset($_GET[$query]) ? $_GET[$query] : '';
        
            $get_parametro = isset($_GET[$query]) ? $_GET[$query] : '';
        
            if (empty($get_parametro)) :
                $get_parametro = isset($_GET[strtoupper($query)]) ? $_GET[strtoupper($query)] : '';
            endif;
        endif;
        
        return $get_parametro;
    }
endif;

if (!function_exists('verifyMethod')):
    function verifyMethod(int $error, string|null $method = null): void
    {
        switch($error):
            case 500:
                $type = 'warning';
                $message = "{$_SERVER['REQUEST_METHOD']} method not allowed";
                break;
        endswitch;

        if(!isset($method) || (isset($method) && $_SERVER['REQUEST_METHOD'] !== $method)):

            abort($error, $message, $type);
        endif;
    }
endif;

if (! function_exists('urlBase')):
    function urlBase(): string
    {
        $project_path = env('PROJECT_PATH');
        $protocol = ((isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
        $host = $_SERVER['HTTP_HOST'];

        return "{$protocol}://{$host}{$project_path}";
    }
endif;

if (! function_exists('abort')):
    function abort(int $error_code, string $message, string $type): void
    {
        loadHtml(__DIR__.'/../../resources/errors/index', [
            'error' => $error_code,
            'type' => $type,
            'message' => $message,
            'title' => $message
        ]);
        exit;
    }
endif;
