<?php

use Src\Models\AccessToken;
use Src\Models\Setting;
use Src\Models\Gallery;

if (!function_exists('getDefaultSiteSettings')) {
    function getDefaultSiteSettings(): array
    {
        return [
            'site_name' => env('APP_NAME'),
            'site_description' => 'Log in!',
            'andress' => '',
            'phone' => '',
            'email' => '',
            'whatsapp' => '',
            'telegram' => '',
            'profile_linkedin' => '',
            'profile_facebook' => '',
            'profile_instagram' => '',
            'profile_twitter' => '',
            'google_analytics_pixel' => '',
            'copyright' => '',
            'telegram_message' => '',
            'whatsapp_message' => '',
            'facebook_pixel' => '',
            'tiktok_pixel' => '',
            'tagmanager_pixel' => '',
            'googleads_pixel' => '',
            'preloader' => 'off',
            'cookies' => '',
            'preloader_image' => '',
            'site_logo_main' => 'logo_main.svg',
            'site_logo_secondary' => 'logo_secondary.png',
            'site_favicon' => 'favicon.png',
            'site_bg_login' => 'bg_login.jpg',
            'construction' => '',
            'maintenance' => 'on',
            'admin_lang' => 'en',
        ];
    }
};

if (!function_exists('normalizeBreadcrumps')) {
    function normalizeBreadcrumps(): array
    {
        $breadcrumpsNormalize = [];
        $breadcrumps = explode('/', path());
        $breadcrumps = array_filter($breadcrumps);
        $path = '';

        foreach ($breadcrumps as $breadcrump) {
            if (substr($breadcrump, 0, 1) !== '?') {
                $path = "{$path}/{$breadcrump}";

                array_push($breadcrumpsNormalize, [
                    'path' => $path,
                    'title' => $breadcrump,
                ]);
            };
        };

        return $breadcrumpsNormalize;
    }
};

if (!function_exists('saveImage')) {
    function saveImage(string $imageKey, ?string $oldFile, ?int $indice = null): ?stdClass
    {
        $gallery = new Gallery();

        if (!is_null($indice)) {
            $file = ['images' => [
                'name' => $_FILES[$imageKey]['name'][$indice],
                'type' => $_FILES[$imageKey]['type'][$indice],
                'tmp_name' => $_FILES[$imageKey]['tmp_name'][$indice],
                'error' => $_FILES[$imageKey]['error'][$indice],
                'size' => $_FILES[$imageKey]['size'][$indice],
            ]];
        } else {
            $file = $_FILES;
        };

        if (isset($file['images']) && !empty($file['images']['name'])) {
            $year = date('Y');
            $month = date('m');
            createDir(__DIR__ . "/../../public/assets/images/uploads/{$year}/{$month}/", 0755);

            $fileName = bin2hex(random_bytes(25));
            $extencion = explode('/', $file['images']['type'])[1];
            $extencion = str_replace('+xml', '', $extencion);
            $filePath = "uploads/{$year}/{$month}/{$fileName}.{$extencion}";

            $name = str_replace(['.jpeg', '.jpg', '.webp', '.svg', '.svg+xml', '.png'], '', $file['images']['name']);
            $name = str_replace(['_', '-'], ' ', $name);

            $gallery = $gallery->create([
                'name' => $name,
                'file' => $filePath,
                'user_id' => $_SESSION['user_id'],
                'size' => $file['images']['size'],
            ]);

            move_uploaded_file($file['images']['tmp_name'], __DIR__ . "/../../public/assets/images/{$filePath}");

            return $gallery;
        };

        return null;
    }
};

if (!function_exists('getSiteSettings')) {
    function getSiteSettings(): ?stdClass
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        if (isset($_SESSION['site_settings'])) {
            $settings = $_SESSION['site_settings'];
        } else {
            $settings = new Setting();
            $gallery = new Gallery();

            if (hasFileEnv() && $settings->hasTable()) {
                $settings = $settings->first();

                if (isset($settings)) {
                    $settings->site_favicon = $gallery->find($settings->site_favicon)->data->file;
                    $settings->site_logo_main = $gallery->find($settings->site_logo_main)->data->file;
                    $settings->site_logo_secondary = $gallery->find($settings->site_logo_secondary)->data->file;
                    $settings->site_bg_login = $gallery->find($settings->site_bg_login)->data->file;

                    $settings = json_encode($settings);
                } else {
                    $settings = json_encode(getDefaultSiteSettings());
                }
            } else {
                $settings = json_encode(getDefaultSiteSettings());
            }

            session(['site_settings' => $settings]);
        };

        return json_decode($settings);
    }
};

if (!function_exists('getDates')) {
    function getDates(string $startDate, string $endDate): array
    {
        if (empty($startDate) && empty($endDate)) {
            $dates = [];
        } elseif (empty($startDate) && !empty($endDate)) {
            $dates = ["{$endDate} 00:00:00", "{$endDate} 23:59:59"];
        } elseif (!empty($startDate) && empty($endDate)) {
            $dates = ["{$startDate} 00:00:00", "{$startDate} 23:59:59"];
        } elseif (!empty($startDate) && !empty($endDate)) {
            $dates = ["{$startDate} 00:00:00", "{$endDate} 23:59:59"];
        };

        return $dates;
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
