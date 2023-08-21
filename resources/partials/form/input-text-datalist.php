<?php 
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
?>

<div class='d-flex flex-column position-relative my-4'>
    <?php if(isset($icon)): ?>
        <i class='<?php echo $icon ?> position-absolute m-2'></i>
    <?php endif; ?>

    <input class='form-control ps-4 py-2 validit-custom' type="<?php echo $type ?>" name="<?php echo $name ?>" list="<?php echo $name ?>" value="<?php echo isset($value) ? $value : '' ?>" <?php echo $attr ?>>
    <datalist id="<?php echo $name ?>"></datalist>
    <label class='position-absolute ms-4 my-2 px-2' for="<?php echo $name ?>">
        <?php echo isset($label) ? $label : '' ?>
        <span class="text-cm-danger"><?php echo $is_required ?></span>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
