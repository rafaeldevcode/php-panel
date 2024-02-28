<?php

use Src\Models\User;

$user = new User();
$user = $user->find($_SESSION['user_id'])->data;

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => 'bg-success',
    'type' => __('Edit'),
    'icon' => 'bi bi-person-bounding-box',
    'title' => __('Profile'),
    'body' => __DIR__ . '/body/form',
    'data' => ['user' => $user],
]);
