<?php

use Src\Models\Setting;

if (!function_exists('normalizeBreadcrumps')):
    /**
     * @since 1.0.0
     * 
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

if (!function_exists('saveImage')):
    /**
     * @since 1.0.0
     * 
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
            $file_path = "uploads/{$file_name}.{$extencion}";
            (!is_null($old_file) && is_file(__DIR__."/../public/assets/images/{$old_file}")) ? unlink(__DIR__."/../public/assets/images/{$old_file}") : '';

            move_uploaded_file($data[$image_key]['tmp_name'], __DIR__."/../public/assets/images/{$file_path}");

            return $file_path;
        endif;

        return null;
    }
endif;

if (!function_exists('getSiteSettings')) :
    /**
     * @since 1.0.0
     * 
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
     * @since 1.0.0
     * 
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
     * @since 1.0.0
     * 
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

if (!function_exists('getAvatars')):
    /**
     * @since 1.0.0
     * 
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
     * @since 1.0.0
     * 
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
     * @since 1.0.0
     * 
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

if(!function_exists('normalizeSlug')):
    /**
     * @since 1.1.0
     * 
     * @param string $title
     * @param string $slug
     * @return string
     */
    function normalizeSlug(string $title, string $slug): string
    {
        $slug = empty($slug) ? $title : $slug;
        $slug = strtolower($slug);
        $slug = str_replace(' ', '-', $slug);
        $slug = preg_replace(["/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"], explode(" ","a A e E i I o O u U n N c C"), $slug);

        return $slug;
    }
endif;
