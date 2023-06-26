<?php 
    require __DIR__ .'/../../vendor/autoload.php';
    require __DIR__ . '/../../suports/helpers.php';

    if(!isAuth()):
        return header('Location: /login', true, 302);
    endif;
?>

<?php getHtml(__DIR__.'/../../partials/header-main.php', ['title' => 'Dashboard']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar.php') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header.php') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps.php', [
                'color' => 'cm-secondary',
                'type'  => 'Visualizar',
                'icon'  => 'bi bi-speedometer',
                'title' => 'Dashboard'
            ]) ?>

            <section class='p-3 bg-cm-light m-3 rounded shadow'>
                <div class='rounded border-color-main border d-flex justify-content-evenly align-items-center flex-wrap cm-browser-height'>
                    <div class="p-2 empty-collections d-flex justify-content-center flex-column align-items-center col-12 col-md-5">
                        <img class="h-100" src="<?php asset('assets/images/welcome.svg') ?>" alt="Dashboard">
                    </div>
                </div>
            </section>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer.php') ?>
</body>
</html>
