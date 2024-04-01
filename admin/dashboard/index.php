<?php

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => 'bg-secondary',
    'type' => __('View'),
    'icon' => 'bi bi-speedometer',
    'title' => __('Dashboard'),
    'body' => __DIR__ . '/body/read',
]);
