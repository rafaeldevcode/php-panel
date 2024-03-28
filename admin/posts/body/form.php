<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route($action) ?>">
        <?php if (isset($post)) { ?>
            <input type="hidden" name="id" value="<?php echo $post->id ?>">
        <?php } ?>
        
        <div class='flex justify-between flex-col-reverse lg:flex-row'>
            <div class="w-full lg:w-9/12 mt-4">
                <textarea id="tinymce" name="content"><?php echo isset($post) ? $post->content : null ?></textarea>
            </div>

            <div class="w-full lg:w-3/12 px-4">
                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-hash',
                        'name' => 'title',
                        'label' => __('Title'),
                        'type' => 'text',
                        'attributes' => 'required',
                        'value' => isset($post) ? $post->title : null,
                    ]) ?>
                </div>

                <div class='w-full pt-1'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-link',
                        'name' => 'slug',
                        'label' => __('Slug (Without spaces and accents)'),
                        'type' => 'text',
                        'value' => isset($post) ? $post->slug : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'status',
                        'label' => __('Status'),
                        'value' => isset($post) ? $post->status : null,
                        'options' => [
                            'published' => __('Published'),
                            'draft' => __('Draft'),
                        ],
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                        'name' => 'thumbnail',
                        'label' => __('Featured image'),
                        'value' => isset($post) ? $post->thumbnail : null,
                        'type' => 'radio',
                    ]) ?>
                </div>
            </div>
        </div>

        <div class='w-full flex flex-wrap my-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                'name' => 'collection',
                'label' => __('Image gallery'),
                'images' => isset($post) ? $images : null,
                'type' => 'checkbox',
            ]) ?>
        </div>

        <div class='flex justify-end mt-10 px-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-button', [
                'type' => 'submit',
                'style' => 'color-main',
                'title' => __('Save'),
                'value' => __('Save'),
            ]) ?>
        </div>
    </form>
</section>
