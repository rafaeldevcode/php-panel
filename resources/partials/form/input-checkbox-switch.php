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

    $checked = (!isset($value) || $value == 'off') ? '' : 'checked';
    
    if(isset($invert_value) && $invert_value):
        $checked = $checked == 'checked' ? '' : 'checked';
    endif; 
?>

<div class='form-check form-switch'>
    <input class='form-check-input' type='checkbox' id='<?php echo $name ?>' name='<?php echo $name ?>' <?php echo $checked ?> <?php echo $attr ?>>
    <label class='form-check-label' for='<?php echo $name ?>'>
        <?php echo $label ?>
        <span class="text-cm-danger"><?php echo $is_required?></span>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
