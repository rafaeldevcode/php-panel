<?php 
    $attr = null;

    if(isset($attributes)):
        if(is_array($attributes)):
            foreach($attributes as $indice => $attribute):
                $attr .= "{$indice}={$attribute} ";
            endforeach;
        else:
            $attr = $attributes;
        endif;
    endif;
?>

<form action='<?php route($route) ?>' method='POST' class='input-group'>
    <input type='search' class='form-control' name='search' placeholder='Pesquisar...' value='<?php isset($value) ? $value : '' ?>' <?php echo $attr ?>>
    <button type='submit' class='input-group-text bg-cm-primary text-light' id='search'>
        <i class='bi bi-search'></i>
    </button>
</form>
