<div class="relative">
    <?php loadHtml(__DIR__ . '/../../partials/preloader', ['position' => 'absolute', 'type' => 'gallery']) ?>

    <div class="flex flex-wrap justify-center" id="gallery">
        <?php foreach ($images->data as $image) { ?>
            <div class="m-2 gallery">
                <input 
                    hidden
                    id="image_<?php echo $image->id ?>"
                    value='<?php echo $image->id ?>'
                    data-message-delete='<?php _e('This action will remove all selected images!') ?>'
                    type='checkbox'
                    data-button="delete-enable"
                    data-checked="add-style"
                >

                <label class="block rounded cursor-pointer w-[150px] h-[150px] border border-secondary p-1" data-click="double" for="image_<?php echo $image->id ?>">
                    <img class="rounded w-full h-full object-contain" src="<?php asset("assets/images/{$image->file}") ?>" alt="<?php echo $image->name ?>">
                </label>
            </div>
        <?php } ?>
    </div>

    <?php if (!is_null($images->next)) { ?>
        <div class="flex mt-3 justify-center">
            <button data-search="<?php echo isset($search) ? $search : '' ?>" data-next-page="<?php echo $images->next ?>" class="btn btn-sm btn-color-main text-light font-bold" type="button" title="Load more images">
                <?php _e('Load more') ?>
            </button>
        </div>
    <?php } ?>

    <div class="border-secondary border-t-2 pt-3 flex justify-between items-start sm:align-items-center flex-col sm:flex-row mt-3 p-3">
        <div>
            <ul class="m-0 p-0 text-secondary">
                <li><strong><?php _e('Total:') ?></strong> <span id="count-images"><?php echo $images->total ?></span> <?php _e('images') ?></li>
                <li><strong><?php _e('Displaying:') ?></strong> <span id="displaying-images"><?php echo count($images->data) ?></span> <?php _e('images') ?></li>
            </ul>
        </div>

        <div class="mt-3 sm:mt-0 mx-auto sm:mx-0">
            <span class="text-secondary"><?php _e('Maximum 20 files') ?></span>

            <form class="flex flex-row justify-center sm:justify-end items-end space-x-2">
                <input type="file" id="input-upload" hidden accept=".svg, .jpg, .jpeg, .png, .webp" multiple>

                <?php if (isset($close) && $close == true) { ?>
                    <button title='<?php _e('Close') ?>' type='button' class='btn btn-secondary' data-modal-close="popup"><?php _e('Close') ?></button>
                <?php } ?>

                <div class="d-flex flex-column">
                    <button title="Realiar upload" type="button" class="btn btn-info text-light font-bold" id="upload">
                        <?php echo isset($textButton) ? $textButton : '' ?>
                        <i class="bi bi-upload"></i>
                    </button>
                </div>

                <?php if (isset($use) && $use == true) { ?>
                    <button disabled title='<?php _e('Select') ?>' type='button' class='btn btn-color-main text-light' id="selected"><?php _e('Select') ?></button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
