<?php
$isRequired = '';
$attr = '';

if (isset($attributes)) {
    if (is_array($attributes)) {
        foreach ($attributes as $indice => $attribute) {
            $attr .= "{$indice}={$attribute} ";
            $isRequired = $indice == 'required' ? '*' : '';
        };
    } else {
        $attr = $attributes;
        $isRequired = $attributes == 'required' ? '*' : '';
    };
};
?>

<div class="my-3">
    <?php if (isset($label)) { ?>
        <label class="text-secondary text-sm font-bold" for="<?php echo $name ?>">
            <?php echo $label ?>
            <span class="text-danger"><?php echo $isRequired ?></span>
        </label>
    <?php } ?>

    <div class='flex flex-col relative'>
        <?php if (isset($icon)) { ?>
            <i class='<?php echo $icon ?> absolute m-2 text-secondary'></i>
        <?php } ?>

        <textarea 
            rows="4"
            <?php echo $attr ?>
            id="<?php echo $name ?>" 
            name="<?php echo $name ?>" 
            placeholder="<?php echo isset($label) ? "{$label}{$isRequired}" : '' ?>"
            class="<?php echo isset($icon) ? 'pl-9' : 'pl-3' ?> placeholder:italic placeholder:text-secondary block p-2 w-full text-sm text-secondary rounded border border-secondary shadow-sm focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1" 
        ><?php echo isset($value) ? $value : '' ?></textarea>
            
        <span class='absolute right-0 bottom-0 validit'></span>
    </div>
</div>
