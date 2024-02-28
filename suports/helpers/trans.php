<?php

if (!function_exists('__')) {
    function __(string $key, array $replaces = [], string $lang = 'en'): string
    {
        return getLangKey($key, $replaces, $lang);
    }
}

if (!function_exists('_e')) {
    function _e(string $key, array $replaces = [], string $lang = 'en'): void
    {
        echo getLangKey($key, $replaces, $lang);
    }
}

if (!function_exists('getLangKey')) {
    function getLangKey(string $key, array $replaces, string $lang): string
    {
        static $cache = [];

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
        return 'en';
    }
}
