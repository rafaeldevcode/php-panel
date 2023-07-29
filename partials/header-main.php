<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php !is_null(SETTINGS) && !empty(SETTINGS['google_analytics']) ? getHtml(__DIR__.'/google-analytics', ['header' => true, 'pixel' => SETTINGS['google_analytics']]) : ''; ?>
    <?php !is_null(SETTINGS) && !empty(SETTINGS['facebook_pixel']) ? getHtml(__DIR__.'/facebook-pixel', ['header' => true, 'pixel' => SETTINGS['facebook_pixel']]) : ''; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='<?php asset('assets/css/style.css?ver='.APP_VERSION) ?>' />
    <link rel='stylesheet' href='<?php asset('libs/bootstrap/bootstrap-icons.css?ver='.APP_VERSION) ?>' />
    <link rel='stylesheet' href='<?php asset('libs/slick/slick/slick.css?ver='.APP_VERSION) ?>' />
    <link rel='stylesheet' href='<?php asset('libs/slick/slick/slick-theme.css?ver='.APP_VERSION) ?>' />
    <link rel='stylesheet' href='<?php asset('assets/css/globals.css?ver='.APP_VERSION) ?>' />
    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <link rel="shortcut icon" href="<?php asset('assets/images/favicon.svg') ?>" type="image/pnh">
    <meta name="description" content="<?php echo !is_null(SETTINGS) ? SETTINGS['site_description'] : '' ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?> | <?php echo $title ?></title>
</head>
<body>
    <?php !is_null(SETTINGS) && !empty(SETTINGS['facebook_pixel']) ? getHtml(__DIR__.'/facebook-pixel', ['header' => false, 'pixel' => SETTINGS['facebook_pixel']]) : ''; ?>

    <?php getHtml(__DIR__.'/message') ?>
    <?php !is_null(SETTINGS) && SETTINGS['preloader'] == 'on' && getHtml(__DIR__.'/preloader', ['position' => 'fixed']) ?>
