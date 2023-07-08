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

    <textarea class='form-control ps-4 py-2 validit-custom' name='<?php echo $name ?>' id='<?php echo $name ?>' <?php echo $attr ?>><?php echo isset($value) ? $value : '' ?></textarea>
    <label class='position-absolute ms-4 my-2 px-2' for='<?php echo $name ?>'>
        <?php echo isset($label) ? $label : '' ?>
        <span class="text-cm-danger"><?php echo $required ?></span>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
