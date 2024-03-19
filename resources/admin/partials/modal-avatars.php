<div data-modal="modal-avatar" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class='bg-white min-w-[800px] border border-color-main rounded' data-modal-body="popup">
        <form action="<?php route('/admin/profile/update-avatar') ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $user_id ?>">
            <div class='bg-color-main relative'>
                <button data-modal-close="popup" type="button" title="<?php _e('Close') ?>" class="absolute top-0 right-2 text-white w-[30px] opacity-50">
                    <i class="bi bi-x text-2xl"></i>
                </button>

                <h2 class="bg-color-main font-bold text-white px-2 py-4 rounded-t text-gray-900"><?php _e('Choose an image') ?></h2>
            </div>

            <div class='flex flex-wrap justify-center items-center m-4'>
                <?php loadHtml(__DIR__ . '/../../partials/form/button-upload', [
                    'name' => 'avatar',
                    'label' => __('Avatar'),
                    'value' => $avatar,
                    'type' => 'radio',
                ]) ?>
            </div>

            <div class="flex justify-end p-2 mt-4">
                <?php loadHtml(__DIR__ . '/../../partials/form/input-button', [
                    'type' => 'submit',
                    'style' => 'color-main',
                    'title' => __('Save'),
                    'value' => __('Save'),
                ]) ?>
            </div>
        </form>
    </div>
</div>
