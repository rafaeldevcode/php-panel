<section class='p-3 bg-cm-light m-0 m-sm-3 rounded shadow'>
    <form method="POST" action="/admin/settings/update.php" enctype="multipart/form-data">
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-link',
                    'name' => 'site_name',
                    'label' => 'Nome do site',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->site_name : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-card-text',
                    'name' => 'site_description',
                    'label' => 'Descrição do site',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->site_description : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-geo-alt-fill',
                    'name' => 'andress',
                    'label' => 'Endereço da empresa',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->andress : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-telephone-fill',
                    'name' => 'phone',
                    'label' => 'Telefone da empresa (adicionar DDD)',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->phone : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-envelope-fill',
                    'name' => 'email',
                    'label' => 'Email da empresa',
                    'type' => 'email',
                    'value' => isset($settings) ? $settings->email : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-linkedin',
                    'name' => 'profile_linkedin',
                    'label' => 'linkedin da empresa',
                    'type' => 'url',
                    'value' => isset($settings) ? $settings->profile_linkedin : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-facebook',
                    'name' => 'profile_facebook',
                    'label' => 'Facebook da empresa',
                    'type' => 'url',
                    'value' => isset($settings) ? $settings->profile_facebook : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-instagram',
                    'name' => 'profile_instagram',
                    'label' => 'Instagram da empresa',
                    'type' => 'url',
                    'value' => isset($settings) ? $settings->profile_instagram : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-whatsapp',
                    'name' => 'whatsapp',
                    'label' => 'Whatsapp da empresa (adicionar DDD)',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->whatsapp : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-chat-quote-fill',
                    'name' => 'whatsapp_message',
                    'label' => 'Menssagem padrão para o whatsapp',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->whatsapp_message : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-telegram',
                    'name' => 'telegram',
                    'label' => 'Telegram da empresa (Usar o nome de usuário)',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->telegram : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-chat-quote-fill',
                    'name' => 'telegram_message',
                    'label' => 'Menssagem padrão para o telegram',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->telegram_message : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-c-circle-fill',
                    'name' => 'copyright',
                    'label' => 'Copyright no rodapé do site',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->copyright : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-google',
                    'name' => 'google_analytics',
                    'label' => 'Pixel do google analytics',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->google_analytics : ''
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-facebook',
                    'name' => 'facebook_pixel',
                    'label' => 'Pixel do facebook',
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->facebook_pixel : ''
                ]) ?>
            </div>

            <div class='col-12'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-checkbox-switch', [
                    'name' => 'cookies',
                    'label' => 'Ativar aviso de cookies (Inativo | Ativo)',
                    'value' => isset($settings) ? $settings->cookies : 'off'
                ]) ?>
            </div>

            <div class="col-12">
                <div class='col-12'>
                    <?php getHtml(__DIR__.'/../../../partials/form/input-checkbox-switch', [
                        'name' => 'preloader',
                        'label' => 'Ativar preloader (Inativo | Ativo)',
                        'value' => isset($settings) ? $settings->preloader : 'off',
                        'attributes' => 'onclick="Preloader.habilit(event);"'
                    ]) ?>

                    <p class="text-cm-secondary">Preloader é uma animação que é executada até que a página esteja carregada e pronta para ser exibida.</p>
                </div>

                <div id="box-preloader" class="border border-color-main rounded" style="display: <?php echo !isset($settings) || $settings->preloader == 'off' ? 'none' : 'flex' ?>;">
                    <div class="p-2">
                        <p class="text-cm-secondary">Escolha uma imagem de animação</p>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center">
                        <?php foreach (getPreloaders() as $indice => $image): ?>
                            <div class='m-2'>
                            <input data-checked="add-style" class='d-none' type='radio' name='preloader_image' id='<?php echo $indice ?>' value='<?php echo $image['src'] ?>' <?php echo isset($settings) && $image['src'] == $settings->preloader_image ? 'checked' : '' ?>>
                                <label for='<?php echo $indice ?>' class='form-check-label rounded label-image-profile border border-cm-secondary'>
                                    <img class="w-100 rounded" src="<?php asset("/assets/images/preloaders/{$image['src']}") ?>" alt="<?php echo $image['alt'] ?>">
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class='col-12 d-flex flex-wrap'>
                <?php getHtml(__DIR__.'/../../../partials/form/button-upload', [
                    'name' => 'site_logo_main',
                    'label' => 'Logo principal (Cor principal)',
                    'value' => (isset($settings) && !empty($settings->site_logo_main)) ? $settings->site_logo_main : null
                ]) ?>

                <?php getHtml(__DIR__.'/../../../partials/form/button-upload', [
                    'name' => 'site_logo_secondary',
                    'label' => 'Logo segundário (Na cor branca)',
                    'value' => (isset($settings) && !empty($settings->site_logo_secondary)) ? $settings->site_logo_secondary : null
                ]) ?>

                <?php getHtml(__DIR__.'/../../../partials/form/button-upload', [
                    'name' => 'site_favicon',
                    'label' => 'Favicon do site',
                    'value' => (isset($settings) && !empty($settings->site_favicon)) ? $settings->site_favicon : null
                ]) ?>

                <?php getHtml(__DIR__.'/../../../partials/form/button-upload', [
                    'name' => 'site_bg_login',
                    'label' => 'Fundo da tela de login',
                    'value' => (isset($settings) && !empty($settings->site_bg_login)) ? $settings->site_bg_login : null
                ]) ?>
            </div>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-button', [
                    'type' => 'submit',
                    'style' => 'color-main',
                    'title' => 'Savar configurações',
                    'value' => 'Salvar'
                ]) ?>
            </div>
        </div>
    </form>
</section>
