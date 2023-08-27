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

<div class='flex flex-col relative my-4'>
    <?php if(isset($icon)): ?>
        <i class='<?php echo $icon ?> absolute m-2 text-cm-secondary'></i>
    <?php endif; ?>

    <textarea 
        id="<?php echo $name ?>" 
        rows="4"
        <?php echo $attr ?>
        class="pl-8 placeholder:italic placeholder:text-cm-secondary block p-2 w-full text-sm text-cm-secondary rounded border border-cm-secondary shadow-sm focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1" 
        placeholder="<?php echo $label.$is_required ?>"
    ><?php echo isset($value) ? $value : '' ?></textarea>
        
    <span class='absolute right-0 bottom-0 validit'></span>
</div>
