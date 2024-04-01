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
    }
}
?>

<div class="my-3 relative">
    <div class="p-4 flex items-center border border-secondary rounded">
        <input 
            id="<?php echo $name ?>" 
            type="<?php echo $type ?>" 
            value="<?php echo $value ?>"
            name="<?php echo $name ?>" 
            class="w-4 h-4"
            data-input-radio="<?php echo $name ?>"
            <?php echo $attr ?>
        >
        
        <?php if (isset($label)) { ?>
            <label for="<?php echo $name ?>" class="w-full ml-2 text-sm font-medium text-secondary">
                <?php echo $label ?>
                <span class="text-danger"><?php echo $isRequired ?></span>
            </label>
        <?php } ?>
    </div>
    
    <span class='absolute right-0 bottom-0 validit'></span>
</div>
