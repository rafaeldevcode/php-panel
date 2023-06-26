<?php 
    require __DIR__ .'/../vendor/autoload.php';
    require __DIR__ . '/../suports/helpers.php';

    if(isAuth()):

        return header('Location: /admin/dashboard', true, 302);
    endif;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='<?php asset('assets/css/style.css') ?>' />
    <link rel='stylesheet' href='<?php asset('libs/bootstrap/bootstrap-icons.css') ?>' />
    <link rel='stylesheet' href='<?php asset('assets/css/globals.css') ?>' />
    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <link rel="shortcut icon" href="<?php asset('assets/images/favicon.png') ?>" type="image/pnh">

    <title><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?> | Login</title>
</head>
<body>

    <?php getHtml(__DIR__.'/../partials/message.php') ?>

    <section class="vh-100 vw-100 d-flex flex-nowrap">
        <div class='col-7 position-relative section-image-login'>
            <div class='position-absolute top-0 start-0 image-bg-login' style="background-image: url(<?php !is_null(SETTINGS) && !empty(SETTINGS['site_bg_login']) ? asset('assets/images/'.SETTINGS['site_bg_login'].'') : asset('assets/images/login_bg.jpg') ?>)"></div>

            <div class='position-absolute bottom-0 start-0 m-2 d-flex flex-nowrap'>
                <div class='me-3'>
                    <i class='bi bi-gear-fill display-4 text-color-main'></i>
                </div>

                <div>
                    <h1 class='m-0 fs-2 text-color-main font-main-bold'><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?></h1>
                    <p class='m-0 fs-4 text-color-main font-main-medium'><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_description']) ? SETTINGS['site_description'] : 'Realize seu login!' ?></p>
                </div>
            </div>
        </div>

        <div class='d-flex flex-column justify-content-center align-items-center col-12 col-lg-5 p-2'>
            <div class='col-12 col-sm-6 col-md-7 mb-5'>
                <img class='w-100' src="<?php !is_null(SETTINGS) && !empty(SETTINGS['site_logo_main']) ? asset('assets/images/'.SETTINGS['site_logo_main'].'') : asset('assets/images/logo_main.png') ?>" alt="Logo <?php echo env('APP_NAME') ?>" />
            </div>

            <form class='col-12 col-sm-6 col-md-7' method="POST" action="/login/login.php">
                <!-- Input email -->
                <div class="my-4">
                    <?php getHtml(__DIR__.'/../partials/form/input-default.php', [
                        'icon'       => 'bi bi-envelope-fill',
                        'name'       => 'email',
                        'label'      => 'Email',
                        'type'       => 'email',
                        'attributes' => 'required'
                    ]) ?>
                </div>

                <!-- Input pass -->
                <div class="my-4">
                    <?php getHtml(__DIR__.'/../partials/form/input-pass.php', [
                        'icon'       => 'bi bi-key-fill',
                        'name'       => 'password',
                        'label'      => 'Senha',
                        'attributes' => 'required'
                    ]) ?>
                </div>

                <!-- Input button -->
                <?php getHtml(__DIR__.'/../partials/form/input-button.php', [
                    'type'  => 'submit',
                    'style' => 'color-main',
                    'title' => 'Realizar login',
                    'value' => 'Logar'
                ]) ?>
            </form>
        </div>
    </section>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.js?ver='.APP_VERSION)?>"></script>
    <script type="text/javascript" src="<?php asset('libs/bootstrap/bootstrap.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Message.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Password.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/ValidateForm.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript">
        Message.hidden('[data-message]');
        Password.show('[data-id-pass]');

        // Validate the form
        const validate = new ValidateForm();
        validate.init();
    </script>
</body>
</html>
