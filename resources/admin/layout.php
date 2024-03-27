<!DOCTYPE html>
<html lang="<?php echo getLang() ?>">
<head>
    <?php !empty(SETTINGS->google_analytics) ? loadHtml(__DIR__ . '/../partials/google-analytics', ['header' => true]) : ''; ?>
    <?php !empty(SETTINGS->facebook_pixel) ? loadHtml(__DIR__ . '/../partials/facebook-pixel', ['header' => true]) : ''; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='<?php asset('libs/bootstrap-icons/bootstrap-icons.min.css') ?>' />

    <?php if (isset($plugins) && in_array('tinymce', $plugins)) { ?>
        <!-- Tinymce start -->
        <script type="text/javascript" src="<?php asset('libs/tinymce/tinymce.js') ?>"></script>
        <link rel='stylesheet' href='<?php asset('libs/tinymce/skins/ui/oxide/skin.min.css') ?>' />
        <link rel='stylesheet' href='<?php asset('libs/tinymce/skins/ui/oxide/content.min.css') ?>' />
        <link rel='stylesheet' href='<?php asset('libs/tinymce/skins/content/default/content.css') ?>' />
        <!-- Tinymce end -->
    <?php } ?>

    <link rel='stylesheet' href='<?php asset('libs/tailwind/admin/style.css') ?>' />
    <link rel='stylesheet' href='<?php asset('assets/css/globals.css') ?>' />
    
    <link rel="shortcut icon" href="<?php asset('assets/images/' . SETTINGS->site_favicon) ?>" alt="Logo <?php echo SETTINGS->site_name ?>">

    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <meta name="description" content="<?php echo SETTINGS->site_description ?>">

    <title><?php echo SETTINGS->site_name ?> | <?php echo $title ?></title>
</head>
<body class="bg-[#e4e4e4]">
    <?php !empty(SETTINGS->facebook_pixel) ? loadHtml(__DIR__ . '/../partials/facebook-pixel', ['header' => false]) : ''; ?>

    <section class='flex flex-nowrap justify-between w-full'>
        <?php loadHtml(__DIR__ . '/partials/sidebar') ?>

        <section class='w-calc'>
            <?php loadHtml(__DIR__ . '/partials/header') ?>

            <?php loadHtml(__DIR__ . '/partials/breadcrumps', [
                'background' => $background,
                'type' => $type,
                'icon' => $icon,
                'title' => $title,
                'routeDelete' => isset($routeDelete) ? $routeDelete : null,
                'routeAdd' => isset($routeAdd) ? $routeAdd : null,
                'routeSearch' => isset($routeSearch) ? $routeSearch : null,
            ]) ?>

            <?php loadHtml($body, isset($data) ? $data : []) ?>
        </section>
    </section>

    <!-- Include footer -->
    <?php loadHtml(__DIR__ . '/partials/footer') ?>

    <!-- Include flash message -->
    <?php loadHtml(__DIR__ . '/../partials/message') ?>

    <!-- Include Preloader -->
    <?php SETTINGS->preloader == 'on' && loadHtml(__DIR__ . '/../partials/preloader', ['position' => 'fixed', 'type' => 'body']) ?>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/main.js') ?>"></script>

    <script type="text/javascript" src="<?php asset('assets/scripts/class/Modal.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Cookies.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/PageBack.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Preloader.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Menu.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Message.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Password.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/ValidateForm.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Remove.js') ?>"></script>
    <script type="text/javascript">
        Menu.checkIsOpen();
        Menu.admin($('#checkbox-menu'));
        Message.hide('[data-message="true"]');
        Password.show('[data-id-pass]');

        // Validate the form
        const validate = new ValidateForm();
        validate.init();

        // Delete item(s)
        const remove = new Remove();
        remove.init();

        PageBack.init();

        document.addEventListener("DOMContentLoaded", () => {
            Preloader.hide('body');
        });

        Modal.init();
    </script>

    <?php if (isset($plugins) && in_array('tinymce', $plugins)) { ?>
        <!-- Tinymce start -->
        <script type="text/javascript" src="<?php asset('libs/tinymce/themes/silver/theme.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/models/dom/model.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/icons/default/icons.js') ?>"></script>

        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/image/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/codesample/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/emoticons/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/emoticons/js/emojis.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/charmap/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/autolink/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/anchor/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/wordcount/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/visualblocks/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/table/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/searchreplace/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/media/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/lists/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/link/plugin.min.js') ?>"></script>
        <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/code/plugin.min.js') ?>"></script>
        <!-- Tinymce end -->
    <?php } ?>

    <?php if (function_exists('loadInFooter')) {
        loadInFooter();
    } ?>
</body>
</html>
