<?php $default = isset($default) ? $default : 'assets/images/no_image.png' ?>

<div class='d-flex flex-column my-4 section-input mx-auto position-relative'>
    <span data-file-image="close" class="bg-color-main position-absolute rounded top-0 end-0">
        <i class="d-flex bi bi-x fs-5 pointer text-cm-light"></i>
    </span>

    <input data-default="<?php echo $default ?>" accept=".png, .jpg, .jpeg, .webp" class='form-control ps-4 py-2 validit-custom' hidden type='file' name='<?php echo $name ?>' id='<?php echo $name ?>' <?php echo isset($attributes) ? $attributes : '' ?>>
    <label class='no-transform-translate mt-4 w-100 h-100 my-2 p-3 section-input-label rounded border border-color-main position-relative d-flex justify-content-center align-items-center' for='<?php echo $name ?>'>
        <span class="position-absolute left-0 top-0 section-input-span">
            <i class="bi bi-image-fill"></i>

            <?php echo $label ?>
        </span>
        <img class="section-input-image" src='<?php isset($src) ? asset($src) : asset($default) ?>' alt='<?php echo $label ?>'>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
