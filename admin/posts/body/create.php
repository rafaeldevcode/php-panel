<section class='p-3 bg-cm-light m-3 rounded shadow'>
    <form method="POST" action="/admin/posts/create.php">
        <div class='row d-flex justify-content-between flex-column-reverse flex-lg-row'>
            <div class="col-12 col-lg-9 mt-4">
                <textarea id="tinymce" name="content"></textarea>
            </div>

            <div class="col-12 col-lg-3">
                <div class='col-12'>
                    <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                        'icon' => 'bi bi-hash',
                        'name' => 'title',
                        'label' => 'Título',
                        'type' => 'text',
                        'attributes' => 'required'
                    ]) ?>
                </div>

                <div class='col-12 py-1'>
                    <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                        'icon' => 'bi bi-link',
                        'name' => 'slug',
                        'label' => 'Slug (Sem espaços e aacentos)',
                        'type' => 'text'
                    ]) ?>
                </div>

                <div class='col-12'>
                    <?php getHtml(__DIR__.'/../../../partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'status',
                        'label' => 'Status',
                        'array' => [
                            'published' => 'Publicado',
                            'draft' => 'Rascunho'
                        ]
                    ]) ?>
                </div>

                <div class='col-12'>
                    <?php getHtml(__DIR__.'/../../../partials/form/button-upload', [
                        'name' => 'thumbnail',
                        'label' => 'Imagen de destaque'
                    ]) ?>
                </div>
            </div>
        </div>

        <div class='col-12 d-flex flex-wrap mt-3'>
            <?php getHtml(__DIR__.'/../../../partials/form/button-upload', [
                'name' => 'collection',
                'label' => 'Galeria de imagens'
            ]) ?>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-button', [
                    'type'  => 'submit',
                    'style' => 'color-main',
                    'title' => 'Savar banner',
                    'value' => 'Salvar'
                ]) ?>
            </div>
        </div>
    </form>
</section>
