<?php

use Src\Models\Gallery;

$gallery = new Gallery();

$images = $gallery->paginate(30);

?>

<div class='modal fade modal-xl' id='modalGallery' tabIndex='-1' aria-labelledby='modalGalleryLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='position-relative modal-content border border-color-main'>
            <div class='modal-header bg-color-main'>
                <h5 class='modal-title text-cm-light' id='modalGalleryLabel'>Galeria de imagens</h5>

                <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar' />
            </div>

            <div class='modal-body d-flex flex-column justify-content-center p-0'>
                <?php getHtml(__DIR__.'/gallery-loop.php', [
                    'images' => $images,
                    'close' => true,
                    'use' => true
                ]) ?>
            </div>
        </div>
    </div>
</div>
