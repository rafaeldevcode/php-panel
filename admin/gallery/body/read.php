<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form class="p-3">
        <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
            'name' => 'select_several',
            'label' => __('Select all images'),
            'attributes' => [
                'data-button' => 'select-several',
            ],
        ]) ?>
    </form>

    <?php loadHtml(__DIR__ . '/../../../resources/admin/partials/gallery-loop', [
        'images' => $images,
        'search' => $search,
        'text_button' => __('Uploads'),
    ]) ?>
</section>
