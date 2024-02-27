<?php

use Src\Models\Gallery;

$gallery = new Gallery();

$images = $gallery->paginate(30);

?>

<div data-modal="gallery" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="bg-white overflow-y-auto rounded p-8 relative h-full w-full max-w-[1000px]" data-modal-body="popup">
        <div class='border border-color-main rounded'>
            <div class='bg-color-main p-4 rounded-t'>
                <h5 class='font-bold text-white' id='modalGalleryLabel'>Galeria de imagens</h5>

                <button data-modal-close="popup" type="button" title="Fechar modal" class="absolute top-0 right-2 text-gray-500 hover:text-gray-800 w-[20px] opacity-50">
                    <i class="bi bi-x text-2xl"></i>
                </button>
            </div>

            <div class='modal-body d-flex flex-column justify-content-center p-0'>
                <?php loadHtml(__DIR__ . '/gallery-loop', [
                    'images' => $images,
                    'close' => true,
                    'use' => true,
                ]) ?>
            </div>
        </div>
    </div>
</div>
