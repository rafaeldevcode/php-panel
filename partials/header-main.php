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
    <!-- <link rel='stylesheet' href='<?php asset('assets/css/globals.css?ver='.APP_VERSION) ?>' /> -->

    <?php if(isset($plugins) && in_array('tinymce', $plugins)): ?>
        <!-- Tinymce start -->
        <script type="text/javascript" src="<?php asset('libs/tinymce/tinymce.js?ver='.APP_VERSION) ?>"></script>
        <link rel='stylesheet' href='<?php asset('libs/tinymce/skins/ui/oxide/skin.min.css?ver='.APP_VERSION) ?>' />
        <link rel='stylesheet' href='<?php asset('libs/tinymce/skins/ui/oxide/content.min.css?ver='.APP_VERSION) ?>' />
        <link rel='stylesheet' href='<?php asset('libs/tinymce/skins/content/default/content.css?ver='.APP_VERSION) ?>' />
        <!-- Tinymce end -->
    <?php endif ?>

    <link rel='stylesheet' href='<?php asset('assets/css/globals.css?ver='.APP_VERSION) ?>' />
    <link rel="shortcut icon" href="<?php asset('assets/images/favicon.svg') ?>" type="image/pnh">

    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <meta name="description" content="<?php echo !is_null(SETTINGS) ? SETTINGS['site_description'] : '' ?>">

    <title><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?> | <?php echo $title ?></title>
</head>
<body>
    <?php !is_null(SETTINGS) && !empty(SETTINGS['facebook_pixel']) ? getHtml(__DIR__.'/facebook-pixel', ['header' => false, 'pixel' => SETTINGS['facebook_pixel']]) : ''; ?>

    <?php getHtml(__DIR__.'/message') ?>
    <?php !is_null(SETTINGS) && SETTINGS['preloader'] == 'on' && getHtml(__DIR__.'/preloader', ['position' => 'fixed']) ?>
