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

    $checked = (!isset($value) || $value == 'off') ? '' : 'checked';
    if(isset($invert_value) && $invert_value):
        $checked = $checked == 'checked' ? '' : 'checked';
    endif; 
?>

<div class='form-check form-switch'>
    <input class='form-check-input' type='checkbox' id='<?php echo $name ?>' name='<?php echo $name ?>' <?php echo $checked ?> <?php echo $attr ?>>
    <label class='form-check-label' for='<?php echo $name ?>'>
        <?php echo $label ?>
        <span class="text-cm-danger"><?php echo $required ?></span>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
