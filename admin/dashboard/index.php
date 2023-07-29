<?php 
    require __DIR__ .'/../../vendor/autoload.php';
    require __DIR__ . '/../../suports/helpers.php';

    if(!isAuth()):
        return header('Location: /login', true, 302);
    endif;
?>

<?php getHtml(__DIR__.'/../../partials/header-main', ['title' => 'Dashboard']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps', [
                'color' => 'cm-secondary',
                'type' => 'Visualizar',
                'icon' => 'bi bi-speedometer',
                'title' => 'Dashboard'
            ]) ?>

            <?php getHtml(__DIR__."/body/read") ?>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer') ?>
</body>
</html>
