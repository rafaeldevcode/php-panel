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

<div class='flex flex-col my-4'>
    <label for="<?php echo $name ?>" class="block mb-2 text-sm font-bold text-cm-secondary">
        <?php echo $label.$is_required ?>
    </label>

    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <?php if(isset($icon)): ?>
                <i class='<?php echo $icon ?> absolute mr-2 my-2 ml-1 text-cm-secondary'></i>
            <?php endif; ?>
        </span>

        <select 
            id="<?php echo $name ?>"
            name="<?php echo $name ?>"
            <?php echo $attr ?>
            class="ps-8 shadow-sm italic border border-cm-secondary text-cm-secondary text-sm rounded focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-2"
        >
            <?php foreach($array as $indice => $item): ?>
                <option value='<?php echo $indice ?>' <?php echo isset($value) && $indice == $value ? 'selected' : '' ?>><?php echo $item ?></option>
            <?php endforeach ?>
        </select>

        <span class='absolute right-0 bottom-0 validit'></span>
    </div>
</div>
