<?php 
    require __DIR__ .'/../../vendor/autoload.php';
    require __DIR__ . '/../../suports/helpers.php';

    use Src\Models\Setting;

    if(!isAuth()):
        return header('Location: /login', true, 302);
    endif;

    $settings = new Setting();
    $settings = $settings->first();
?>

<?php getHtml(__DIR__.'/../../partials/header-main.php', ['title' => 'Configurações']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar.php') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header.php') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps.php', [
                'color' => 'cm-success',
                'type'  => 'Editar',
                'icon'  => 'bi bi-gear-fill',
                'title' => 'Configurações'
            ]) ?>

            <?php getHtml(__DIR__."/body/edit.php", ['settings' => !empty($settings) ? $settings[0] : null]) ?>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer.php') ?>

    <script type="text/javascript" src="<?php asset('assets/scripts/class/Preloader.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/ImagesUpload.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript">
        $('#phone').mask('+00 (00) 0 0000-0000');
        $('#whatsapp').mask('+00 (00) 0 0000-0000');

        const imageUplod = new ImagesUpload();

        imageUplod.changeAttributes($('#site_logo_main'));
        imageUplod.changeAttributes($('#site_logo_secondary'));
        imageUplod.changeAttributes($('#site_favicon'));
        imageUplod.changeAttributes($('#site_bg_login'));

        imageUplod.remove();
    </script>
</body>
</html>
