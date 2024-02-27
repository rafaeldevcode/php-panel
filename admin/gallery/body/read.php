<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <form class="p-3">
        <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
            'name' => 'select_several',
            'label' => 'Selecionar todas as imagens',
            'attributes' => [
                'data-button' => 'select-several',
            ],
        ]) ?>
    </form>

    <?php loadHtml(__DIR__ . '/../../../resources/admin/partials/gallery-loop', [
        'images' => $images,
        'search' => $search,
        'text_button' => 'Uploads',
    ]) ?>
</section>
