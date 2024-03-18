<?php

require __DIR__ . '/bootstrap/bootstrap.php';

use Src\Settings;

$settings = new Settings();

if (isset($argv[1])) {
    if ($argv[1] == 'migrate') {

        $settings->migrate();
    } elseif ($argv[1] == 'initial-setup') {

        $settings->initialSetup();
    } elseif ($argv[1] == 'change-color-svg') {
        
        $settings->changeColorSvg($argv[2], $argv[3]);
    };
};
