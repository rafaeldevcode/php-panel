<?php 
    $required = '';

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
?>

<div class='d-flex flex-column position-relative my-4'>
    <?php if(isset($icon)): ?>
        <i class='<?php echo $icon ?> position-absolute m-2'></i>
    <?php endif; ?>

    <input class='form-control ps-4 py-2 validit-custom' type='password' name="<?php echo $name ?>" id="<?php echo $name ?>" value="<?php echo isset($value) ? $value : '' ?>" <?php echo $attr ?>>
    <button type='button' data-id-pass="show-pass" title='Exibir senha' class='btn btn-sm btn-show-pass position-absolute end-0 h-100'><i class='bi bi-eye-fill'></i></button>
    <label class='position-absolute ms-4 my-2 px-2' for="<?php echo $name ?>">
        <?php echo isset($label) ? $label : '' ?>
        <span class="text-cm-danger"><?php echo $required ?></span>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
