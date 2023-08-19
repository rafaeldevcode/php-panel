<?php 
    require __DIR__ .'/../../vendor/autoload.php';
    require __DIR__ . '/../../suports/helpers.php';

    loadHtml(__DIR__.'/../../resources/admin/layout', [
        'color' => 'cm-secondary',
        'type' => 'Visualizar',
        'icon' => 'bi bi-speedometer',
        'title' => 'Dashboard',
        'body' => __DIR__."/body/read"
    ]);
