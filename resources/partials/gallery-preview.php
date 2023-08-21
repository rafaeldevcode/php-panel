<div class='modal fade' id='modalGalleryPreview' tabIndex='-1' aria-labelledby='modalGalleryPreviewLabel' aria-hidden='true'>
    <div class='modal-dialog modal-fullscreen'>
        <div class='position-relative modal-content border border-color-main'>
            <div class='modal-header bg-color-main'>
                <h5 class='modal-title text-cm-light' id='modalGalleryPreviewLabel'>Visualizar imagens</h5>

                <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar' />
            </div>

            <div class='modal-body d-flex flex-column justify-content-center p-0'>
                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                    <img id="image-preview" class="galery-image-preview" src="#" alt="">
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-between p-0">
                <button id="previous" class="border-top-0 border-bottom-0 border-start-0 m-0 border-end-1 border-secondary px-2 py-3 h-100 bg-transparent rounded-bottom" type="button" title="Imagem anterior">
                    <i class="bi bi-arrow-left-short"></i>
                </button>

                <div class="text-start">
                    <ul class="m-0 p-0">
                        <li class="text-cm-secondary"><b>Nome: </b><span id="name"></span></li>
                        <li class="text-cm-secondary"><b>Link: </b><span id="url"></span></li>
                    </ul>
                </div>

                <button id="next" class="border-top-0 border-bottom-0 border-start-1 m-0 border-end-0 border-secondary px-2 py-3 h-100 bg-transparent rounded-bottom" type="button" title="Próxima imagem">
                    <i class="bi bi-arrow-right-short"></i>
                </button>
            </div>
        </div>
    </div>
</div>
