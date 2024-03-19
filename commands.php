<?php

require __DIR__ . '/bootstrap/bootstrap.php';

use Src\Commands;

$commands = new Commands();

if (isset($argv[1])) {
    if ($argv[1] == 'migrate') {

        $commands->migrate();
    } elseif ($argv[1] == 'initial-setup') {

        $commands->initialSetup();
    } elseif ($argv[1] == 'change-color-svg') {
        
        $commands->changeColorSvg($argv[2], $argv[3]);
    };
};
