<?php
$isRequired = '';
$attr = '';

if(isset($attributes)):
    if(is_array($attributes)):
        foreach($attributes as $indice => $attribute):
            $attr .= "{$indice}={$attribute} ";
            $isRequired = $indice == 'required' ? '*' : '';
        endforeach;
    else:
        $attr = $attributes;
        $isRequired = $attributes == 'required' ? '*' : '';
    endif;
endif;
?>

<div class="my-3">
    <?php if (isset($label)) { ?>
        <label class="text-secondary text-sm font-bold" for="<?php echo $name ?>">
            <?php echo $label ?>
            <span class="text-danger"><?php echo $isRequired ?></span>
        </label>
    <?php } ?>

    <label class="relative block">
        <?php if (isset($icon)) { ?>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <i class='<?php echo $icon ?> absolute mr-2 my-2 ml-1 text-secondary'></i>
            </span>
        <?php } ?>

        <input 
            class="placeholder:italic placeholder:text-secondary block bg-white w-full border border-secondary rounded py-2 <?php echo isset($icon) ? 'pl-9' : 'pl-3' ?> pr-3 shadow-sm focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1 sm:text-sm" 
            placeholder="<?php echo isset($label) ? "{$label}{$isRequired}" : '' ?>" 
            type="<?php echo $type ?>" 
            name="<?php echo $name ?>"
            id="<?php echo $name ?>"
            value="<?php echo isset($value) ? $value : '' ?>"
            <?php echo $attr ?>
        />

        <?php if ($type === 'password') { ?>
            <button type='button' data-id-pass="show-pass" title='<?php _e('View password') ?>' class='btn-color-main px-1 rounded-r absolute top-0 right-0 h-full'>
                <i class='bi bi-eye-fill'></i>
            </button>
        <?php } ?>

        <span class='absolute right-0 bottom-0 validit'></span>
    </label>
</div>
