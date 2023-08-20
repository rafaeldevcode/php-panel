<?php

use Src\Models\AccessToken;

if (! function_exists('requests')):
    /**
     * @since 1.0.0
     * 
     * @return stdClass|array
     */
    function requests(): stdClass|array
    {
        $data = $_POST+$_GET;

        return json_decode(json_encode($data));
    }
endif;

if (!function_exists('session')):
    /**
     * @since 1.0.0
     * 
     * @param array $data
     * @return void
     */
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
    /**
     * @since 1.4.0
     * 
     * @param ?bool $redirect
     * @return bool
     */
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
    /**
     * @since 1.0.0
     * 
     * @param string $query
     * @return string
     */
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
    /**
     * @since 1.1.0
     * 
     * @param int $error
     * @param string|null $method
     * @return void
     */
    function verifyMethod(int $error, string|null $method = null): void
    {
        switch($error):
            case 500:
                $type = 'cm-warning';
                $message = "{$_SERVER['REQUEST_METHOD']} method not allowed";
                $title = 'Not allowed';
                break;
        endswitch;

        if(!isset($method) || (isset($method) && $_SERVER['REQUEST_METHOD'] !== $method)):
            loadHtml(__DIR__.'/../resources/errors/index', [
                'error' => $error,
                'type' => $type,
                'message' => $message,
                'title' => $title
            ]);
        endif;
    }
endif;

if (! function_exists('urlBase')):
    /**
     * @since 1.1.0
     * 
     * @return string
     */
    function urlBase(): string
    {
        $project_path = env('PROJECT_PATH');
        $protocol = ((isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
        $host = $_SERVER['HTTP_HOST'];

        return "{$protocol}://{$host}{$project_path}";
    }
endif;
