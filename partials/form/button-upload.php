<?php

    use Src\Models\Gallery;

    $required = '';
    $image = null;

    if(isset($attributes)):
        if(is_array($attributes)):
            $attr = '';
            foreach($attributes as $indice => $attribute):
                $attr .= "{$indice}={$attribute} ";
                $required = $indice == 'required' ? '*' : '';
            endforeach;
        else:
            $attr = $attributes;
            $required = $attributes == 'required' ? '*' : '';
        endif;
    else:
        $attr = '';
    endif;

    if(isset($value)):
        $gallery = new Gallery();
        $image = $gallery->find($value)->data;
    endif;
?>

<div class="d-flex flex-column position-relative">
    <label for="<?php echo $name ?>" class="text-cm-secondary ms-2">
        <?php echo $label ?>
        <span class="text-cm-danger"><?php echo $required ?></span>
    </label>

    <button id="<?php echo $name ?>" type="button" title="Open modal gallery" class="border-color-main m-2 btn" data-upload="<?php echo $name ?>">
        <img class="w-100" src="<?php asset('assets/images/select-files.png') ?>" alt="Open gallery">
    </button>
    
    <div data-upload-selected="<?php echo $name ?>" data-required="<?php echo !empty($required) ? 'required' : '' ?>">
        <div class="m-2 gallery rounded">
            <?php if(isset($value)): ?>
                <input <?php echo !empty($required) ? 'required' : '' ?> value="<?php echo $value ?>" type="text" hidden name="<?php echo $name ?>" data-checked="add-style">

                <?php if(!is_null($image)): ?>
                    <div class="position-relative" data-upload-image="selected">
                        <div class="bg-color-main d-flex justify-content-end p-1 w-100 rounded-top">
                            <button type="button" title="Remover imagem" class="border-0 bg-transparent p-0" data-upload-image="remove">
                                <i class="bi bi-trash text-cm-danger"></i>
                            </button>
                        </div>

                        <img class="w-100 rounded-bottom" src="<?php asset("assets/images/{$image->file}") ?>" alt="<?php echo $image->name ?>">
                    </div>
                <?php endif;
            endif ?>

            <?php if(!empty($required)): ?>
                <span class='position-absolute end-0 bottom-0 me-2 mb-3 validit'></span>
            <?php endif; ?>
        </div>
    </div>
</div>
