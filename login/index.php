<?php if (autenticate(false)) {
    return header(route('/admin/dashboard', true), true, 302);
} ?>

<!DOCTYPE html>
<html lang="<?php echo getLang() ?>" class="h-full w-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='<?php asset('libs/tailwind/admin/style.css') ?>' />
    <link rel='stylesheet' href='<?php asset('libs/bootstrap-icons/bootstrap-icons.min.css') ?>' />
    <link rel='stylesheet' href='<?php asset('assets/css/globals.css') ?>' />
    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <link rel="shortcut icon" href="<?php asset('assets/images/' . SETTINGS->site_favicon) ?>" alt="Logo <?php echo SETTINGS->site_name ?>">

    <title><?php echo SETTINGS->site_name ?> | Login</title>
</head>
<body class="h-full w-full">

    <?php loadHtml(__DIR__ . '/../resources/partials/message') ?>

    <main class="h-full w-full flex flex-nowrap">
        <div class='w-7/12 relative hidden lg:block'>
            <div class='absolute top-0 left-0 image-bg-login' style="background-image: url(<?php asset('assets/images/' . SETTINGS->site_bg_login) ?>)"></div>

            <div class='absolute bottom-0 left-0 m-2 flex flex-nowrap'>
                <div class='me-3'>
                    <i class='bi bi-gear-fill text-7xl text-color-main'></i>
                </div>

                <div>
                    <h1 class='m-0 text-4xl text-color-main font-bold'><?php echo SETTINGS->site_name ?></h1>
                    <p class='m-0 text-xl text-color-main font-bold'><?php echo SETTINGS->site_description ?></p>
                </div>
            </div>
        </div>

        <div class='flex flex-col justify-center items-center w-full lg:w-5/12 p-2'>
            <div class='w-full sm:w-6/12 md:w-7/12 mb-5'>
                <img class='w-full' src="<?php asset('assets/images/' . SETTINGS->site_logo_main) ?>" alt="Logo <?php echo SETTINGS->site_name ?>" />
            </div>

            <form class='w-full sm:w-6/12 md:w-7/12' method="POST" action="<?php route('/login/create') ?>">
                <!-- Input email -->
                <div class="mt-6">
                    <?php loadHtml(__DIR__ . '/../resources/partials/form/input-default', [
                        'icon' => 'bi bi-envelope-fill',
                        'name' => 'email',
                        'label' => __('Email'),
                        'type' => 'email',
                        'attributes' => 'required',
                    ]) ?>
                </div>

                <!-- Input pass -->
                <div class="mt-6">
                    <?php loadHtml(__DIR__ . '/../resources/partials/form/input-default', [
                        'icon' => 'bi bi-key-fill',
                        'name' => 'password',
                        'label' => __('Password'),
                        'type' => 'password',
                        'attributes' => 'required',
                    ]) ?>
                </div>

                <!-- Input button -->
                <div class="flex justify-end">
                    <?php loadHtml(__DIR__ . '/../resources/partials/form/input-button', [
                        'type' => 'submit',
                        'style' => 'color-main',
                        'title' => __('Log in'),
                        'value' => 'Logar',
                    ]) ?>
                </div>
            </form>
        </div>
    </main>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php asset('libs/bootstrap/bootstrap.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Message.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Password.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/ValidateForm.js') ?>"></script>
    <script type="text/javascript">
        Message.hide('[data-message]');
        Password.show('[data-id-pass]');

        // Validate the form
        const validate = new ValidateForm();
        validate.init();
    </script>
</body>
</html>
