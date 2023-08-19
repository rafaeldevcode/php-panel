<section class='p-3 bg-cm-light m-3 rounded shadow'>
    <form method="POST" action="/admin/posts/update.php">
        <?php if(isset($post)): ?>
            <input type="hidden" name="id" value="<?php echo $post->id ?>">
        <?php endif ?>
        
        <div class='row d-flex justify-content-between flex-column-reverse flex-lg-row'>
            <div class="col-12 col-lg-9 mt-4">
                <textarea id="tinymce" name="content"><?php echo isset($post) ? $post->content : null ?></textarea>
            </div>

            <div class="col-12 col-lg-3">
                <div class='col-12'>
                    <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-hash',
                        'name' => 'title',
                        'label' => 'Título',
                        'type' => 'text',
                        'attributes' => 'required',
                        'value' => isset($post) ? $post->title : null
                    ]) ?>
                </div>

                <div class='col-12 py-1'>
                    <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-link',
                        'name' => 'slug',
                        'label' => 'Slug (Sem espaços e aacentos)',
                        'type' => 'text',
                        'value' => isset($post) ? $post->slug : null
                    ]) ?>
                </div>

                <div class='col-12'>
                    <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'status',
                        'label' => 'Status',
                        'value' => isset($post) ? $post->status : null,
                        'array' => [
                            'published' => 'Publicado',
                            'draft' => 'Rascunho'
                        ]
                    ]) ?>
                </div>

                <div class='col-12'>
                    <?php loadHtml(__DIR__.'/../../../resources/partials/form/button-upload', [
                        'name' => 'thumbnail',
                        'label' => 'Imagen de destaque',
                        'value' => isset($post) ? $post->thumbnail : null,
                        'type' => 'radio',
                    ]) ?>
                </div>
            </div>
        </div>

        <div class='col-12 d-flex flex-wrap my-4'>
            <?php loadHtml(__DIR__.'/../../../resources/partials/form/button-upload', [
                'name' => 'collection',
                'label' => 'Galeria de imagens',
                'images' => isset($post) ? $images : null,
                'type' => 'checkbox',
            ]) ?>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-button', [
                    'type'  => 'submit',
                    'style' => 'color-main',
                    'title' => 'Savar banner',
                    'value' => 'Salvar'
                ]) ?>
            </div>
        </div>
    </form>
</section>
