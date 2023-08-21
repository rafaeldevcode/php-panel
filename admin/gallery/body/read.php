<section class='bg-cm-light m-0 m-sm-3 rounded shadow position-relative'>
    <form class="p-3">
        <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-checkbox-switch', [
            'name' => 'select_several',
            'label' => 'Selecionar todas as imagens',
            'attributes' => [
                'data-button' => 'select-several'
            ]
        ]) ?>
    </form>

    <?php loadHtml(__DIR__.'/../../../resources/partials/gallery-loop', [
        'images' => $images,
        'search' => $search,
        'text_button' => 'Uploads'
    ]) ?>
</section>
