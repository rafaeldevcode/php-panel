<?php
$attr = '';

if (isset($attributes)) {
    if (is_array($attributes)) {
        foreach ($attributes as $indice => $attribute) {
            $attr .= "{$indice}={$attribute} ";
        };
    } else {
        $attr = $attributes;
    }
}
?>

<div class='flex flex-col my-3'>
    <button class='flex items-center justify-center btn cursor-pointer btn-<?php echo $style ?> py-2 w-[150px] font-bold text-lg text-light' type="<?php echo $type ?>" title="<?php echo $title ?>" <?php echo $attr ?>>
        <?php echo $value ?>

        <?php if (isset($icon)) { ?>
            <i class='<?php echo $icon ?> mr-2 text-lg'></i>
        <?php } ?>
    </button>
</div>
