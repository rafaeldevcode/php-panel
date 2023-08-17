<?php

    use Src\Models\Gallery;

    $is_required = null;
    $attr = null;

    if(isset($attributes)):
        if(is_array($attributes)):
            foreach($attributes as $indice => $attribute):
                $attr .= "{$indice}={$attribute} ";
                $is_required = $indice == 'required' ? '*' : null;
            endforeach;
        else:
            $attr = $attributes;
            $is_required = $attributes == 'required' ? '*' : null;
        endif;
    endif;

    if(isset($value)):
        $gallery = new Gallery();
        $images = [$gallery->find($value)->data];
    endif;
?>

<div class="d-flex flex-column position-relative">
    <label for="<?php echo $name ?>" class="text-cm-secondary ms-2">
        <?php echo $label ?>
        <span class="text-cm-danger"><?php echo isset($is_required) ? $is_required : '' ?></span>
    </label>

    <button id="<?php echo $name ?>" type="button" title="Open modal gallery" class="border-color-main m-2 btn" data-upload="<?php echo $name ?>">
        <img class="w-100" src="<?php asset('assets/images/select-files.png') ?>" alt="Open gallery">
    </button>

    <div class="d-flex flex-wrap" data-upload-selected="<?php echo $name ?>" data-required="<?php echo isset($is_required) ? 'required' : '' ?>">
        <!-- Add this snippet only when creating a new record and it is mandatory - start -->
        <?php if(isset($is_required) && !isset($images)): ?>
            <div class="m-2 gallery rounded">
                <input value="" type="text" hidden name="<?php echo $type == 'checkbox' ? "{$name}[]" : $name ?>" data-checked="add-style" <?php echo isset($attr) ? $attr : '' ?>>
                <span class='position-absolute start-0 top-0 mt-5 validit'></span>
            </div>
        <?php endif; ?>
        <!-- Add this snippet only when creating a new record and it is mandatory - end -->

        <?php if(isset($images)): 
            foreach($images as $image): ?>
                <div class="m-2 gallery rounded">
                    <input value="<?php echo $image->id ?>" type="text" hidden name="<?php echo $type == 'checkbox' ? "{$name}[]" : $name ?>" data-checked="add-style" <?php echo isset($attr) ? $attr : '' ?>>
                    
                    <div class="position-relative" data-upload-image="selected">
                        <div class="bg-color-main d-flex justify-content-end p-1 w-100 rounded-top">
                            <button type="button" title="Remover imagem" class="border-0 bg-transparent p-0" data-upload-image="remove">
                                <i class="bi bi-trash text-cm-danger"></i>
                            </button>
                        </div>

                        <img class="w-100 rounded-bottom" src="<?php asset("assets/images/{$image->file}") ?>" alt="<?php echo $image->name ?>">
                    </div>

                    <?php if(isset($is_required)): ?>
                        <span class='position-absolute start-0 top-0 mt-5 validit'></span>
                    <?php endif; ?>
                </div>
            <?php endforeach;
        endif ?>
    </div>
</div>
