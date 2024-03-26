<?php

require __DIR__ . '/bootstrap/bootstrap.php';

use Src\Commands;

$commands = new Commands();

if (isset($argv[1])) {
    if ($argv[1] == 'migrate-up') {

        $commands->migrateUp();
    } elseif ($argv[1] == 'initial-setup') {

        $commands->initialSetup();
    } elseif ($argv[1] == 'change-color-svg') {
        
        $commands->changeColorSvg($argv[2], $argv[3]);
    } elseif ($argv[1] == 'migrate-down') {
        
        $commands->migrateDown();
    };
};
