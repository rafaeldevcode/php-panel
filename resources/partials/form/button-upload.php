<?php

use Src\Models\Gallery;

$isRequired = null;
$attr = null;

if (isset($attributes)) {
    if (is_array($attributes)) {
        foreach ($attributes as $indice => $attribute) {
            $attr .= "{$indice}={$attribute} ";
            $isRequired = $indice == 'required' ? '*' : null;
        };
    } else {
        $attr = $attributes;
        $isRequired = $attributes == 'required' ? '*' : null;
    };
};

if (isset($value)) {
    $gallery = new Gallery();
    $images = [$gallery->find($value)->data];
}
?>

<div class="flex flex-col relative">
    <label for="<?php echo $name ?>" class="text-secondary ml-2">
        <?php echo $label ?>
        <span class="text-danger"><?php echo $isRequired ?></span>
    </label>

    <button id="<?php echo $name ?>" type="button" title="<?php _e('Open gallery modal') ?>" class="border rounded p-2 border-color-main m-2" data-upload="<?php echo $name ?>">
        <img class="w-full" src="<?php asset('assets/images/select-files.png') ?>" alt="Open gallery">
    </button>

    <div class="flex flex-wrap" data-upload-selected="<?php echo $name ?>" data-required="<?php echo isset($isRequired) ? 'required' : '' ?>">
        <!-- Add this snippet only when creating a new record and it is mandatory - start -->
        <?php if (isset($isRequired) && !isset($images)) { ?>
            <div class="m-2 w-[150px] h-[150px] rounded">
                <input value="" type="text" hidden name="<?php echo $type == 'checkbox' ? "{$name}[]" : $name ?>" data-checked="add-style" <?php echo $attr ?>>
                <span class='absolute left-0 top-0 mt-5 validit'></span>
            </div>
        <?php } ?>
        <!-- Add this snippet only when creating a new record and it is mandatory - end -->

        <?php if (isset($images)) {
            foreach ($images as $image) { ?>
                <div class="m-2 w-[150px] h-[150px] rounded">
                    <input value="<?php echo $image->id ?>" type="text" hidden name="<?php echo $type == 'checkbox' ? "{$name}[]" : $name ?>" data-checked="add-style" <?php echo $attr ?>>
                    
                    <div class="relative" data-upload-image="selected">
                        <div class="bg-color-main flex justify-end p-1 w-full rounded-t">
                            <button type="button" title="Remover imagem" class="border-0 bg-transparent p-0" data-upload-image="remove">
                                <i class="bi bi-trash text-danger"></i>
                            </button>
                        </div>

                        <img class="rounded-b w-full h-full object-contain" src="<?php asset("assets/images/{$image->file}") ?>" alt="<?php echo $image->name ?>">
                    </div>

                    <?php if (isset($isRequired)) { ?>
                        <span class='absolute left-0 top-0 mt-5 validit'></span>
                    <?php } ?>
                </div>
            <?php };
        } ?>
    </div>
</div>
