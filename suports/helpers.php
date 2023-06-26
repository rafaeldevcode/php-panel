<?php

use Src\Models\AccessToken;
use Src\Models\Setting;

require __DIR__.'/env.php';

define('APP_VERSION', '1.4.0');

if (! function_exists('requests')):
    /**
     * @return stdClass|array
     */
    function requests(): stdClass|array
    {
        $data = $_POST+$_GET;

        return json_decode(json_encode($data));
    }
endif;

if (! function_exists('asset')):
    /**
     * @param string $route
     * @return void
     */
    function asset(string $path): void
    {
        $protocol = ((isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
        $host = $_SERVER['HTTP_HOST'];
        $project_path = env('PROJECT_PATH');
        $assets_path = env('ASSETS_PATH');
        $project_path = !empty($project_path) ? "/{$project_path}" : '';
        $assets_path = !empty($assets_path) ? "/{$assets_path}" : '';

        $url = "{$protocol}://{$host}{$project_path}{$assets_path}/{$path}";

        echo $url;
    }
endif;

if (!function_exists('dd')):
    /**
     * @return void
     */
    function dd(): void
    {
        echo '<pre>';
        array_map(function($x) {var_dump($x);}, func_get_args());
        die;
    }
endif;

if (!function_exists('getHtml')):
    /**
     * @param string $path
     * @param array $data
     * @return void
     */
    function getHtml(string $path, array $data = []): void
    {
        extract($data);

        require $path;
    }
endif;

if (!function_exists('getMenus')):
    /**
     * @return array
     */
    function getMenus(): array
    {
        $menus = [
            'dashboard' => [
                'path'  => '/admin/dashboard',
                'title' => 'Dashboard' ,
                'icon'  => 'bi bi-speedometer',
                'count' => null      
            ],
            'users' => [
                'path'  => '/admin/users',
                'title' => 'Usuários' ,
                'icon'  => 'bi bi-people-fill',
                'count' => null
            ],
            'settings' => [
                'path'  => '/admin/settings',
                'title' => 'Configurações',
                'icon'  => 'bi bi-gear-fill',
                'count' => null
            ]
        ];

        return $menus;
    }
endif;

if (!function_exists('path')):
    /**
     * @return string
     */
    function path(): string
    {
        if (($_SERVER['SERVER_NAME']  === 'localhost') ||
            ($_SERVER['SERVER_NAME'] === '127.0.0.1') ||
            ($_SERVER['SERVER_NAME'] === '0.0.0.0') ||
            ($_SERVER['SERVER_NAME'] == env('IP_ROOT'))
        ) :
            $path = $_SERVER['REQUEST_URI'];
        else :
            $path = $_SERVER['REQUEST_URI'];
        endif;

        $path = explode('?', $path)[0];

        return rtrim($path, '/');
    }
endif;

if (!function_exists('activeMenuClient')):
    /**
     * @param string $path
     * @return bool
     */
    function activeMenuClient(string $path): bool
    {
        $active = false;

        if(path() == $path || (empty(path()) && $path == '/')){
            $active = true;
        }elseif(explode('/', path())[1] == 'seguros' && explode('/', $path)[1] == 'seguros'){
            $active = true;
        }

        return $active;
    }
endif;

if (!function_exists('normalizeBreadcrumps')):
    /**
     * @return array
     */
    function normalizeBreadcrumps(): array
    {
        $breadcrumps_normalize = [];
        $breadcrumps = explode('/', path());
        $breadcrumps = array_filter($breadcrumps);
        $path = '';

        foreach($breadcrumps as $breadcrump):
            if(substr($breadcrump, 0, 1) !== '?'):
                $path = "{$path}/{$breadcrump}";

                array_push($breadcrumps_normalize, [
                    'path'  => $path,
                    'title' => $breadcrump
                ]);
            endif;
        endforeach;

        return $breadcrumps_normalize;
    }
endif;

if (!function_exists('session')):
    /**
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

if (!function_exists('saveImage')):
    /**
     * @param array|null $data
     * @param string $image_key
     * @param string|null $old_file
     * @return string|null
     */
    function saveImage(array|null $data, string $image_key, string|null $old_file): string|null
    {
        if(isset($data[$image_key]) && !empty($data[$image_key]['name'])):
            $file_name = bin2hex(random_bytes(25));
            $extencion = explode('/', $data[$image_key]['type'])[1];
            $file_path = "settings/{$file_name}.{$extencion}";
            (!is_null($old_file) && is_file(__DIR__."/../public/assets/images/{$old_file}")) ? unlink(__DIR__."/../public/assets/images/{$old_file}") : '';

            move_uploaded_file($data[$image_key]['tmp_name'], __DIR__."/../public/assets/images/{$file_path}");

            return $file_path;
        endif;

        return null;
    }
endif;

if (!function_exists('isAuth')):
    /**
     * @return bool
     */
    function isAuth(): bool
    {
        if(!isset($_SESSION)):
            session_start();
        endif;

        $token = isset($_SESSION['token']) ? $_SESSION['token'] : false;

        if($token):
            $acc_token = new AccessToken();
            $acc_token = $acc_token->where('token', '=', $token)->last();
    
            return (isset($acc_token->token) && $acc_token->token == $token) ? true : false;
        endif;

        return false;
    }
endif;

if (!function_exists('querys')):
    /**
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

if (!function_exists('getSiteSettings')) :
    /**
     * @return array|null
     */
    function getSiteSettings(): array|null
    {
        if(!isset($_SESSION)):
            session_start();
        endif;

        if(isset($_SESSION['site_settings'])):

            $settings = $_SESSION['site_settings'];
        else:
            $settings = new Setting();
            $settings = $settings->first();

            session(['site_settings' => $settings]);
        endif;

        return $settings;
    }
endif;

if (!function_exists('getDates')) :
    /**
     * @param string $start_date
     * @param string $end_date
     * @return array
     */
    function getDates(string $start_date, string $end_date): array
    {
        if(empty($start_date) && empty($end_date)):

            $dates = [];
        elseif(empty($start_date) && !empty($end_date)):

            $dates = ["{$end_date} 00:00:00", "{$end_date} 23:59:59"];
        elseif(!empty($start_date) && empty($end_date)):

            $dates = ["{$start_date} 00:00:00", "{$start_date} 23:59:59"];
        elseif(!empty($start_date) && !empty($end_date)):

            $dates = ["{$start_date} 00:00:00", "{$end_date} 23:59:59"];
        endif;

        return $dates;
    }
endif;

if (!function_exists('getStates')) :
    /**
     * @return array
     */
    function getStates(): array
    {
        return [
            ""   => "---",
            "AC" => "Acre",
            "AL" => "Alagoas",
            "AP" => "Amapá",
            "AM" => "Amazonas",
            "BA" => "Bahia",
            "CE" => "Ceará",
            "ES" => "Espírito Santo",
            "GO" => "Goiás",
            "MA" => "Maranhão",
            "MT" => "Mato Grosso",
            "MS" => "Mato Grosso do Sul",
            "MG" => "Minas Gerais",
            "PA" => "Pará",
            "PB" => "Paraíba",
            "PR" => "Paraná",
            "PE" => "Pernambuco",
            "PI" => "Piauí",
            "RJ" => "Rio de Janeiro",
            "RN" => "Rio Grande do Norte",
            "RS" => "Rio Grande do Sul",
            "RO" => "Rondônia",
            "RR" => "Roraima",
            "SC" => "Santa Catarina",
            "SP" => "São Paulo",
            "SE" => "Sergipe",
            "TO" => "Tocantins",
            "DF" => "Distrito Federal"
        ];
    }
endif;

if (!function_exists('verifyMethod')):
    /**
     * @param int $error
     * @param string|null $method
     * @return void
     */
    function verifyMethod(int $error, string|null $method = null): void
    {
        switch($error):
            case 500:
                $type    = 'cm-warning';
                $message = "{$_SERVER['REQUEST_METHOD']} method not allowed";
                $title   = 'Not allowed';
                break;
        endswitch;

        if(!isset($method) || (isset($method) && $_SERVER['REQUEST_METHOD'] !== $method)):
            getHtml(__DIR__.'/../errors/index.php', [
                'error'   => $error,
                'type'    => $type,
                'message' => $message,
                'title'   => $title
            ]);
        endif;
    }
endif;

if (!function_exists('getAvatars')):
    /**
     * @return array
     */
    function getAvatars(): array
    {
        return [
            1 => [
                "src" => "default.png",
                "alt" => "Default"
            ],
            2 => [
                "src" => "ant_man.png",
                "alt" => "Ant Man"
            ],
            3 => [
                "src" => "avangers.png",
                "alt" => "Avangers"
            ],
            4 => [
                "src" => "black_hawk.png",
                "alt" => "Black Hawk"
            ],
            5 => [
                "src" => "black_panther.png",
                "alt" => "Black Panther"
            ],
            6 => [
                "src" => "black_widow.png",
                "alt" => "Black Widow"
            ],
            7 => [
                "src" => "captain_america.png",
                "alt" => "Captain America"
            ],
            8 => [
                "src" => "captain_marvel.png",
                "alt" => "Captain Marvel"
            ],
            9 => [
                "src" => "daredevil.png",
                "alt" => "Daredevil"
            ],
            10 => [
                "src" => "elektra.png",
                "alt" => "Eleketra"
            ],
            11 => [
                "src" => "ghost_rider.png",
                "alt" => "Ghost Rider"
            ],
            12 => [
                "src" => "hulk.png",
                "alt" => "Hulk"
            ],
            13 => [
                "src" => "iron_first.png",
                "alt" => "Iron First"
            ],
            14 => [
                "src" => "iron_man.png",
                "alt" => "Iron Man"
            ],
            15 => [
                "src" => "jessica_jones.png",
                "alt" => "Jessica Jones"
            ],
            16 => [
                "src" => "luke_cage.png",
                "alt" => "Luke Cage"
            ],
            17 => [
                "src" => "moon_knight.png",
                "alt" => "Moon Knight"
            ],
            18 => [
                "src" => "nova.png",
                "alt" => "Nova"
            ],
            19 => [
                "src" => "punisher.png",
                "alt" => "Punisher"
            ],
            20 => [
                "src" => "spider_gwen.png",
                "alt" => "Spider Gwen"
            ],
            21 => [
                "src" => "spider_ham.png",
                "alt" => "Spider Ham"
            ],
            22 => [
                "src" => "spider_man.png",
                "alt" => "Spider Man"
            ],
            23 => [
                "src" => "vision.png",
                "alt" => "Vision"
            ],
            24 => [
                "src" => "wasp.png",
                "alt" => "Wasp"
            ]
        ];
    }
endif;

if (!function_exists('getPreloaders')):
    /**
     * @return array
     */
    function getPreloaders(): array
    {
        return [
            1 => [
                "src" => "preloader_default.gif",
                "alt" => "Preloader Default"
            ],
            2 => [
                "src" => "preloader_one.gif",
                "alt" => "Preloader One"
            ],
            3 => [
                "src" => "preloader_two.gif",
                "alt" => "Preloader Two"
            ],
            4 => [
                "src" => "preloader_three.gif",
                "alt" => "Preloader Three"
            ],
            5 => [
                "src" => "preloader_four.gif",
                "alt" => "Preloader Four"
            ],
            6 => [
                "src" => "preloader_five.gif",
                "alt" => "Preloader Five"
            ],
            7 => [
                "src" => "preloader_six.gif",
                "alt" => "Preloader Six"
            ],
            8 => [
                "src" => "preloader_seven.gif",
                "alt" => "Preloader Seven"
            ],
            9 => [
                "src" => "preloader_eight.gif",
                "alt" => "Preloader Eight"
            ],
            10 => [
                "src" => "preloader_nine.gif",
                "alt" => "Preloader Nine"
            ],
            11 => [
                "src" => "preloader_teen.gif",
                "alt" => "Preloader Teen"
            ]
        ];
    }
endif;

if(!function_exists('getOnly')):
    /**
     * @param array $only
     * @param array $data
     * @param bool $contains
     * @return array
     */
    function getOnly(array $only, array $data, bool $contains = true): array
    {
        $keys = [];
        $values = [];

        foreach($data as $indice => $value):
            if($contains):
                if(in_array($indice, $only)):
                    array_push($keys, $indice);
                    array_push($values, $value);
                endif;
            else:
                if(!in_array($indice, $only)):
                    array_push($keys, $indice);
                    array_push($values, $value);
                endif;
            endif;
        endforeach;

        return array_combine($keys, $values);
    }
endif;

if(!function_exists('routes')):
    /**
     * @return array
     */
    function routes(): array
    {
        return [
            '/',
            '/admin/dashboard',
            '/admin/users',
            '/admin/settings',
            '/admin/profile',
            '/quem-somos',
            '/politicas-de-privacidade',
            '/login'
        ];
    }
endif;

!defined('SETTINGS') && define('SETTINGS', getSiteSettings());
