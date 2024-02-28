<div data-modal="delete" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="bg-white rounded w-full max-w-[500px]" data-modal-body="popup">
        <div class="p-4 relative bg-danger rounded-t">
            <button data-modal-close="popup" type="button" title="<?php _e('Close') ?>" class="absolute top-0 right-2 text-white hover:text-gray-800 w-[20px] opacity-50">
                <i class="bi bi-x text-2xl"></i>
            </button>

            <h2 class="font-bold text-white p-2 rounded text-center" id="modalDeleteItemLabel"></h2>
        </div>

        <form data-submit="delete" class="mt-8 p-4">
            <div class="flex justify-end space-x-2">
                <button data-modal-close="popup" type="button" title="<?php _e('No') ?>" class="btn btn-secondary font-bold">
                    <?php _e('No') ?>
                </button>

                <button type="submit" title="<?php _e('Yes') ?>" class="btn btn-color-main font-bold">
                    <?php _e('Yes') ?>
                </button>
            </div>
        </form>
    </div>
</div>
