<?php 
    if(isset($attributes)):
        if(is_array($attributes)):
            $attr = '';
            foreach($attributes as $indice => $attribute):
                $attr .= "{$indice}={$attribute} ";
            endforeach;
        else:
            $attr = $attributes;
        endif;
    else:
        $attr = '';
    endif;
?>

<div class="me-3 mt-3">
    <input data-input-radio="<?php echo $name ?>" hidden class="form-check-input mt-0 input-radio-cm" <?php echo $attr ?> name="<?php echo $name ?>"  id="<?php echo $for ?>" type="<?php echo $type ?>" value="<?php echo $value ?>">
    <label for="<?php echo $for ?>" class="border rounded py-1 px-2 border-2 pointer border-color-main bg-cm-light">
        <?php if(isset($icon)): ?>
            <i class='<?php echo $icon ?>'></i>
        <?php endif; ?>
        
        <?php echo $label ?>
    </label>
    <span class='position-absolute left-0 bottom-0 validit'></span>
</div>
