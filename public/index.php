<?php

require __DIR__ . '/../bootstrap/bootstrap.php';

$path = empty(path()) ? '/' : path();
$routes = routes();
$maintenance = SETTINGS->maintenance;
$construction = SETTINGS->construction;

if (strpos($path, '/admin') !== false && !autenticate()) {
    if ($path == '/login') {
        loadHtml(__DIR__ . getFileName($path));
    } else {
        return header(route('/login', true), true, 302);
    };
} else {
    if (in_array($path, $routes)) {
        if (!autenticate() && strpos($path, '/login') === false) {
            if ($construction === 'on') {
                abort(__('construction'), __('We are still in the construction process.<br>We will be live soon!'), 'color-main');
                die;
            } elseif ($maintenance === 'on') {
                abort(__('maintenance'), __("We are making some adjustments and improvements.<br>We'll be back soon!"), 'color-main');
                die;
            };
        };

        loadHtml(__DIR__ . '/..' . getFileName($path));
    } else {
        abort(404, __('Not Found'), 'danger');
    };
};
