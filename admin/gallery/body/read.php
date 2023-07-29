<section class='bg-cm-light m-3 rounded shadow position-relative'>
    <form class="p-3">
        <?php getHtml(__DIR__.'/../../../partials/form/input-checkbox-switch.php', [
            'name' => 'select_several',
            'label' => 'Selecionar todas as imagens',
            'attributes' => [
                'data-button' => 'select-several'
            ]
        ]) ?>
    </form>

    <?php getHtml(__DIR__.'/../../../partials/gallery-loop.php', [
        'images' => $images,
        'search' => $search,
        'text_button' => 'Uploads'
    ]) ?>
</section>
