<?php

use Src\Models\AccessToken;
use Src\Models\Setting;
use Src\Models\Gallery;

if (!function_exists('normalizeBreadcrumps')) {
    function normalizeBreadcrumps(): array
    {
        $breadcrumps_normalize = [];
        $breadcrumps = explode('/', path());
        $breadcrumps = array_filter($breadcrumps);
        $path = '';

        foreach ($breadcrumps as $breadcrump) {
            if (substr($breadcrump, 0, 1) !== '?') {
                $path = "{$path}/{$breadcrump}";

                array_push($breadcrumps_normalize, [
                    'path' => $path,
                    'title' => $breadcrump,
                ]);
            };
        };

        return $breadcrumps_normalize;
    }
};

if (!function_exists('saveImage')) {
    function saveImage(string $image_key, string|null $old_file, int|null $indice = null): stdClass|null
    {
        $gallery = new Gallery();

        if (!is_null($indice)) {
            $file = ['images' => [
                'name' => $_FILES[$image_key]['name'][$indice],
                'type' => $_FILES[$image_key]['type'][$indice],
                'tmp_name' => $_FILES[$image_key]['tmp_name'][$indice],
                'error' => $_FILES[$image_key]['error'][$indice],
                'size' => $_FILES[$image_key]['size'][$indice],
            ]];
        } else {
            $file = $_FILES;
        };

        if (isset($file['images']) && !empty($file['images']['name'])) {
            $year = date('Y');
            $month = date('m');
            createDir(__DIR__ . "/../../public/assets/images/uploads/{$year}/{$month}/", 0755);

            $file_name = bin2hex(random_bytes(25));
            $extencion = explode('/', $file['images']['type'])[1];
            $extencion = str_replace('+xml', '', $extencion);
            $file_path = "uploads/{$year}/{$month}/{$file_name}.{$extencion}";

            $name = str_replace(['.jpeg', '.jpg', '.webp', '.svg', '.svg+xml', '.png'], '', $file['images']['name']);
            $name = str_replace(['_', '-'], ' ', $name);

            $gallery = $gallery->create([
                'name' => $name,
                'file' => $file_path,
                'user_id' => $_SESSION['user_id'],
                'size' => $file['images']['size'],
            ]);

            move_uploaded_file($file['images']['tmp_name'], __DIR__ . "/../../public/assets/images/{$file_path}");

            return $gallery;
        };

        return null;
    }
};

if (!function_exists('getSiteSettings')) {
    function getSiteSettings(): stdClass|null
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        if (isset($_SESSION['site_settings'])) {
            $settings = $_SESSION['site_settings'];
        } else {
            $settings = new Setting();
            $gallery = new Gallery();
            $settings = $settings->first();

            $settings->site_favicon = $gallery->find($settings->site_favicon)->data->file;
            $settings->site_logo_main = $gallery->find($settings->site_logo_main)->data->file;
            $settings->site_logo_secondary = $gallery->find($settings->site_logo_secondary)->data->file;
            $settings->site_bg_login = $gallery->find($settings->site_bg_login)->data->file;

            $settings = json_encode($settings);

            session(['site_settings' => $settings]);
        };

        return json_decode($settings);
    }
};

if (!function_exists('getDates')) {
    function getDates(string $start_date, string $end_date): array
    {
        if (empty($start_date) && empty($end_date)) {
            $dates = [];
        } elseif (empty($start_date) && !empty($end_date)) {
            $dates = ["{$end_date} 00:00:00", "{$end_date} 23:59:59"];
        } elseif (!empty($start_date) && empty($end_date)) {
            $dates = ["{$start_date} 00:00:00", "{$start_date} 23:59:59"];
        } elseif (!empty($start_date) && !empty($end_date)) {
            $dates = ["{$start_date} 00:00:00", "{$end_date} 23:59:59"];
        };

        return $dates;
    }
};

if (!function_exists('getStates')) {
    function getStates(): array
    {
        return [
            '' => '---',
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
            'DF' => 'Distrito Federal',
        ];
    }
};

if (!function_exists('getAvatars')) {
    function getAvatars(): array
    {
        return [
            1 => [
                'src' => 'default.png',
                'alt' => 'Default',
            ],
            2 => [
                'src' => 'ant_man.png',
                'alt' => 'Ant Man',
            ],
            3 => [
                'src' => 'avangers.png',
                'alt' => 'Avangers',
            ],
            4 => [
                'src' => 'black_hawk.png',
                'alt' => 'Black Hawk',
            ],
            5 => [
                'src' => 'black_panther.png',
                'alt' => 'Black Panther',
            ],
            6 => [
                'src' => 'black_widow.png',
                'alt' => 'Black Widow',
            ],
            7 => [
                'src' => 'captain_america.png',
                'alt' => 'Captain America',
            ],
            8 => [
                'src' => 'captain_marvel.png',
                'alt' => 'Captain Marvel',
            ],
            9 => [
                'src' => 'daredevil.png',
                'alt' => 'Daredevil',
            ],
            10 => [
                'src' => 'elektra.png',
                'alt' => 'Eleketra',
            ],
            11 => [
                'src' => 'ghost_rider.png',
                'alt' => 'Ghost Rider',
            ],
            12 => [
                'src' => 'hulk.png',
                'alt' => 'Hulk',
            ],
            13 => [
                'src' => 'iron_first.png',
                'alt' => 'Iron First',
            ],
            14 => [
                'src' => 'iron_man.png',
                'alt' => 'Iron Man',
            ],
            15 => [
                'src' => 'jessica_jones.png',
                'alt' => 'Jessica Jones',
            ],
            16 => [
                'src' => 'luke_cage.png',
                'alt' => 'Luke Cage',
            ],
            17 => [
                'src' => 'moon_knight.png',
                'alt' => 'Moon Knight',
            ],
            18 => [
                'src' => 'nova.png',
                'alt' => 'Nova',
            ],
            19 => [
                'src' => 'punisher.png',
                'alt' => 'Punisher',
            ],
            20 => [
                'src' => 'spider_gwen.png',
                'alt' => 'Spider Gwen',
            ],
            21 => [
                'src' => 'spider_ham.png',
                'alt' => 'Spider Ham',
            ],
            22 => [
                'src' => 'spider_man.png',
                'alt' => 'Spider Man',
            ],
            23 => [
                'src' => 'vision.png',
                'alt' => 'Vision',
            ],
            24 => [
                'src' => 'wasp.png',
                'alt' => 'Wasp',
            ],
        ];
    }
};

if (!function_exists('getPreloaders')) {
    function getPreloaders(): array
    {
        return [
            1 => [
                'src' => 'preloader_default.gif',
                'alt' => 'Preloader Default',
            ],
            2 => [
                'src' => 'preloader_one.gif',
                'alt' => 'Preloader One',
            ],
            3 => [
                'src' => 'preloader_two.gif',
                'alt' => 'Preloader Two',
            ],
            4 => [
                'src' => 'preloader_three.gif',
                'alt' => 'Preloader Three',
            ],
            5 => [
                'src' => 'preloader_four.gif',
                'alt' => 'Preloader Four',
            ],
            6 => [
                'src' => 'preloader_five.gif',
                'alt' => 'Preloader Five',
            ],
            7 => [
                'src' => 'preloader_six.gif',
                'alt' => 'Preloader Six',
            ],
            8 => [
                'src' => 'preloader_seven.gif',
                'alt' => 'Preloader Seven',
            ],
            9 => [
                'src' => 'preloader_eight.gif',
                'alt' => 'Preloader Eight',
            ],
            10 => [
                'src' => 'preloader_nine.gif',
                'alt' => 'Preloader Nine',
            ],
            11 => [
                'src' => 'preloader_teen.gif',
                'alt' => 'Preloader Teen',
            ],
        ];
    }
};

if (!function_exists('getOnly')) {
    function getOnly(array $only, array $data, bool $contains = true): array
    {
        $keys = [];
        $values = [];

        foreach ($data as $indice => $value) {
            if ($contains) {
                if (in_array($indice, $only)) {
                    array_push($keys, $indice);
                    array_push($values, $value);
                };
            } else {
                if (!in_array($indice, $only)) {
                    array_push($keys, $indice);
                    array_push($values, $value);
                };
            };
        };

        return array_combine($keys, $values);
    }
};

if (!function_exists('normalizeSlug')) {
    function normalizeSlug(string $slug): string
    {
        $slug = preg_replace('/[áàãâä]/u', 'a', $slug);
        $slug = preg_replace('/[ÁÀÃÂÄ]/u', 'A', $slug);
        $slug = preg_replace('/[éèêë]/u', 'e', $slug);
        $slug = preg_replace('/[ÉÈÊË]/u', 'E', $slug);
        $slug = preg_replace('/[íìîï]/u', 'i', $slug);
        $slug = preg_replace('/[ÍÌÎÏ]/u', 'I', $slug);
        $slug = preg_replace('/[óòõôö]/u', 'o', $slug);
        $slug = preg_replace('/[ÓÒÕÔÖ]/u', 'O', $slug);
        $slug = preg_replace('/[úùûü]/u', 'u', $slug);
        $slug = preg_replace('/[ÚÙÛÜ]/u', 'U', $slug);
        $slug = preg_replace('/[ñ]/u', 'n', $slug);
        $slug = preg_replace('/[Ñ]/u', 'N', $slug);
        $slug = preg_replace('/[ç]/u', 'c', $slug);
        $slug = preg_replace('/[Ç]/u', 'C', $slug);
        $slug = preg_replace('/[&]/u', 'e', $slug);

        $slug = strtolower($slug);

        $slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);

        $slug = preg_replace('/-+/', '-', $slug);

        $slug = trim($slug, '-');

        return $slug;
    }
};

if (!function_exists('getExcerpt')) {
    function getExcerpt(?string $content, int $lenght = 200): ?string
    {
        if (is_null($content)) {
            return $content;
        }

        $paragraphs = strip_tags($content, '<p>');
        $paragraph = preg_split('/<p[^>]*>/', $paragraphs);
        $paragraph = explode('</p>', $paragraph[1]);

        $excerpt = strlen($paragraph[0]) > $lenght ? mb_substr($paragraph[0], 0, $lenght) . '...' : $paragraph[0];

        return html_entity_decode($excerpt);
    }
};

if (!function_exists('createDir')) {
    function createDir(string $path, int $permission): bool
    {
        $success = false;

        if (!is_dir($path)) {
            if (mkdir($path, $permission, true)) {
                $success = true;
            } else {
                $success = false;
            };
        } else {
            $success = true;
        };

        return $success;
    }
};

if (!function_exists('deleteDir')) {
    function deleteDir(string $path): string
    {
        $message = '';

        if (file_exists($path)) {
            if (unlink($path)) {
                $message = __('deleted');
            } else {
                $message = __('not deleted');
            };
        } else {
            $message = __('not found');
        };

        return $message;
    }
};

if (!function_exists('extractIdsLoggedUsers')) {
    function extractIdsLoggedUsers(): array
    {
        $tokens = new AccessToken();
        $tokens = $tokens->get();
        $ids = [];

        foreach ($tokens as $token) {
            array_push($ids, $token->user_id);
        };

        return $ids;
    }
};
