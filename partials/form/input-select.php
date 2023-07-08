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

    <select class='form-select ps-4 focus-shadown-none' name='<?php echo $name ?>' id='<?php echo $name ?>' <?php echo $attr ?>>
        <?php foreach($array as $indice => $item): ?>
            <option value='<?php echo $indice ?>' <?php echo isset($value) && $indice == $value ? 'selected' : '' ?>><?php echo $item ?></option>
        <?php endforeach; ?>
    </select>
    <label class='position-absolute ms-4 my-2 px-2 input-transform-translate' for='permission'>
        <?php echo $label ?>
        <span class="text-cm-danger"><?php echo $required ?></span>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
