<div class='modal fade' id='avatar' tabIndex='-1' aria-labelledby='avatar-label' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content border border-color-main'>
            <form action="/admin/profile/update-avatar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user_id ?>">
                <div class='modal-header bg-color-main'>
                    <h5 class='modal-title text-cm-light' id='avatar-label'>Escolha uma imagem</h5>
                    <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar'></button>
                </div>

                <div class='modal-body'>
                    <div class='d-flex flex-wrap justify-content-evenly m-0'>
                        <?php foreach (getAvatars() as $indice => $image): ?>
                            <div class='m-2'>
                            <input data-checked="add-style" class='d-none' type='radio' name='avatar' id='<?php echo $indice ?>' value='<?php echo $image['src'] ?>' <?php echo $image['src'] == $avatar ? 'checked' : '' ?>>
                                <label for='<?php echo $indice ?>' class='form-check-label rounded-circle label-image-profile'>
                                    <img class="w-100 rounded-circle" src="<?php asset("/assets/images/users/{$image['src']}") ?>" alt="<?php echo $image['alt'] ?>">
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="modal-footer p-2">
                    <?php loadHtml(__DIR__.'/form/input-button', [
                        'type' => 'submit',
                        'style' => 'color-main',
                        'title' => 'Savar usuário',
                        'value' => 'Salvar'
                    ]) ?>
                </div>
            </form>
        </div>
    </div>
</div>
