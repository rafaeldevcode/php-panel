<?php 
    loadHtml(__DIR__.'/../../resources/admin/layout', [
        'color' => 'secondary',
        'type' => 'Visualizar',
        'icon' => 'bi bi-speedometer',
        'title' => 'Dashboard',
        'body' => __DIR__."/body/read"
    ]);
