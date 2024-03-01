<?php

if (!function_exists('__')) {
    function __(string $key, array $replaces = [], ?string $lang = null): string
    {
        return getLangKey($key, $replaces, $lang);
    }
}

if (!function_exists('_e')) {
    function _e(string $key, array $replaces = [], ?string $lang = null): void
    {
        echo getLangKey($key, $replaces, $lang);
    }
}

if (!function_exists('getLangKey')) {
    function getLangKey(string $key, array $replaces, ?string $lang): string
    {
        static $cache = [];

        $lang = is_null($lang) ? getLang() : $lang;
        $lang = strtolower($lang);
        $langDir = __DIR__ . '/../../lang';
        $filePath = "{$langDir}/{$lang}.json";

        if (!isset($cache[$lang])) {
            $cache[$lang] = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
        }

        $key = isset($cache[$lang][$key]) ? $cache[$lang][$key] : $key;

        return str_replace(array_keys($replaces), array_values($replaces), $key);
    }
}

if (!function_exists('getLang')) {
    function getLang(): string 
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        $lang = !autenticate() ? $_SESSION['client_lang'] : SETTINGS['admin_lang'];

        return is_null($lang) ? 'en' : $lang;
    }
}

if (!function_exists('getAvailableLanguages')) {
    function getAvailableLanguages(): array
    {
        $langs = [];
        $langDir = __DIR__ . '/../../lang/';
        $files = scandir($langDir);

        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $array = explode('.', $file);
                
                if (isset($array[1]) && $array[1] === 'json') {
                    $langs = $langs+[$array[0] => $array[0]];
                }
            }
        }

        return $langs;
    }
}
