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

<?php getHtml(__DIR__.'/../../partials/header-main', ['title' => 'Configurações']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps', [
                'color' => 'cm-success',
                'type' => 'Editar',
                'icon' => 'bi bi-gear-fill',
                'title' => 'Configurações'
            ]) ?>

            <?php getHtml(__DIR__."/body/edit", ['settings' => $settings]) ?>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer') ?>
    <?php getHtml(__DIR__.'/../../partials/gallery') ?>

    <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript">
        $('#phone').mask('+00 (00) 0 0000-0000');
        $('#whatsapp').mask('+00 (00) 0 0000-0000');

        const gallery = new Gallery();

        gallery.openModalSelect($('[data-upload=site_logo_main]'));
        gallery.openModalSelect($('[data-upload=site_logo_secondary]'));
        gallery.openModalSelect($('[data-upload=site_favicon]'));
        gallery.openModalSelect($('[data-upload=site_bg_login]'));
    </script>
</body>
</html>
