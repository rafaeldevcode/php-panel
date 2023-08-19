<div>
    <?php loadHtml(__DIR__.'/preloader', ['position' => 'absolute']) ?>

    <div class="d-flex flex-wrap justify-content-center" id="gallery">
        <?php foreach ($images->data as $image): ?>
            <div class="m-2 gallery">
                <input 
                    hidden
                    id="image_<?php echo $image->id ?>"
                    value='<?php echo $image->id ?>'
                    data-message-delete='Esta ação irá remover todas as imagens selecionados!'
                    type='checkbox'
                    data-button="delete-enable"
                    data-checked="add-style"
                >

                <label class="form-check-label rounded pointer border border-cm-secondary p-1" data-click="double" for="image_<?php echo $image->id ?>">
                    <img class="rounded" src="<?php asset("assets/images/{$image->file}") ?>" alt="<?php echo $image->name ?>">
                </label>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if(!is_null($images->next)): ?>
        <div class="d-flex mt-3 justify-content-center">
            <button data-search="<?php echo isset($search) ? $search : '' ?>" data-next-page="<?php echo $images->next ?>" class="btn btn-sm btn-color-main text-cm-light fw-bold" type="button" title="Load more images">
                Carregar mais
            </button>
        </div>
    <?php endif ?>

    <div class="border-top pt-3 d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row mt-3 p-3">
        <div>
            <ul class="m-0 p-0 text-cm-secondary">
                <li><strong>Total:</strong> <span id="count-images"><?php echo $images->total ?></span> imagens</li>
                <li><strong>Exibindo:</strong> <span id="displaying-images"><?php echo count($images->data) ?></span> imagens</li>
            </ul>
        </div>

        <div class="mt-3 mt-sm-0 mx-auto mx-sm-0">
            <span class="text-cm-secondary">Máximo de 20 arquivos</span>

            <form class="d-flex flex-row justify-content-center justify-content-sm-end align-items-end">
                <input type="file" id="input-upload" hidden accept=".svg, .jpg, jpeg, .png, webp" multiple>

                <?php if(isset($close) && $close == true): ?>
                    <button title='Fechar modal' type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                <?php endif ?>

                <div class="d-flex flex-column <?php echo isset($use) ? 'mx-1' : '' ?>">
                    <button title="Realiar upload" type="button" class="btn btn-cm-info text-cm-light fw-bold" id="upload">
                        <?php echo isset($text_button) ? $text_button : '' ?>
                        <i class="bi bi-upload"></i>
                    </button>
                </div>

                <?php if(isset($use) && $use == true): ?>
                    <button disabled title='Remover usuário' type='button' class='btn btn-color-main text-cm-light' id="selected">Usar</button>
                <?php endif;?>
            </form>
        </div>
    </div>
</div>
