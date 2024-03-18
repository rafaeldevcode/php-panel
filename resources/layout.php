<!DOCTYPE html>
<html lang="<?php echo getLang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='<?php asset('libs/tailwind/admin/style.css') ?>' />
    <link rel='stylesheet' href='<?php asset('libs/bootstrap-icons/bootstrap-icons.min.css') ?>' />
    <link rel='stylesheet' href='<?php asset('assets/css/globals.css') ?>' />
    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />

    <title><?php echo $title ?></title>
</head>
<body>

    <main class='w-screen h-screen flex justify-center items-center custom-<?php echo $error ?>'>
        <div class='container flex flex-col justify-center items-center border rounded border-<?php echo $type ?> m-2 custom-<?php echo $error ?>-mirror'>
            <ul class='flex flex-nowrap text-<?php echo $type ?> list-unstyled text-center'>
                <li class='font-bold text-4xl capitalize'><?php echo $error ?></li>
                <li class='text-4xl mx-4'>|</li>
                <li class='text-4xl'><?php echo $message ?></li>
            </ul>

            <?php if (is_int($error)) { ?>
                <button id='back' class='mt-4 btn btn-<?php echo $type ?> text-light' title="<?php _e('To go back') ?>"><?php _e('To go back') ?></button>
            <?php } ?>
        </div>
    </main>

</body>
</html>
