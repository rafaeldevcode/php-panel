<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='<?php asset('assets/css/style.css') ?>' />
        <link rel='stylesheet' href='<?php asset('libs/bootstrap/bootstrap-icons.css') ?>' />
        <link rel='stylesheet' href='<?php asset('assets/css/globals.css') ?>' />
        <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
        <link rel="shortcut icon" href="<?php asset('assets/images/favicon.svg') ?>" type="image/pnh">

        <title><?php echo $title ?></title>
    </head>

    <body class="antialiased">
        <main class='vw-100 vh-100 d-flex justify-content-center align-items-center custom-<?php echo $error ?>'>
            <div class='container d-flex flex-column justify-content-center align-items-center border rounded border-<?php echo $type ?> m-2 custom-<?php echo $error ?>-mirror'>
                <ul class='d-flex flex-nowrap text-<?php echo $type ?> list-unstyled'>
                    <li class='fw-bolder display-6'><?php echo $error ?></li>
                    <li class='display-6 mx-4'>|</li>
                    <li class='display-6'><?php echo $message ?></li>
                </ul>

                <button id='back' class='btn btn-<?php echo $type ?> text-light'>Voltar</button>
            </div>
        </main>
    </body>
    
    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/PageBack.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript">
        PageBack.init();
    </script>
</html>
