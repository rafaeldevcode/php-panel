<?php
$isRequired = null;
$attr = null;

if (isset($attributes)) {
    if (is_array($attributes)) {
        foreach ($attributes as $indice => $attribute) {
            $attr .= "{$indice}={$attribute} ";
            $isRequired = $indice == 'required' ? '*' : null;
        };
    } else {
        $attr = $attributes;
        $isRequired = $attributes == 'required' ? '*' : null;
    };
};
?>

<div class='flex flex-col my-3'>
    <label for="<?php echo $name ?>" class="block mb-1 text-sm font-bold text-secondary">
        <?php echo $label ?>
        <span class="text-danger"><?php echo $isRequired ?></span>
    </label>

    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <?php if (isset($icon)) { ?>
                <i class='<?php echo $icon ?> absolute mr-2 my-2 ml-1 text-secondary'></i>
            <?php } ?>
        </span>

        <select 
            id="<?php echo $name ?>"
            name="<?php echo $name ?>"
            <?php echo $attr ?>
            class="ps-8 shadow-sm italic border bg-white focus:outline-none border-secondary text-secondary text-sm rounded focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-2"
        >
            <?php foreach ($array as $indice => $item) { ?>
                <option value='<?php echo $indice ?>' <?php echo isset($value) && $indice == $value ? 'selected' : '' ?>><?php echo $item ?></option>
            <?php } ?>
        </select>

        <span class='absolute right-0 bottom-0 validit'></span>
    </div>
</div>
