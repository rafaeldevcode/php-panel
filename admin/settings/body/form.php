<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route('/admin/settings/update') ?>" enctype="multipart/form-data">
        <div class='flex flex-wrap justify-between'>
            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-link',
                    'name' => 'site_name',
                    'label' => __('Website name'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->site_name : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-card-text',
                    'name' => 'site_description',
                    'label' => __('Website description'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->site_description : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-geo-alt-fill',
                    'name' => 'andress',
                    'label' => __("Company's adress"),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->andress : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-telephone-fill',
                    'name' => 'phone',
                    'label' => __('Company telephone number (add area code)'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->phone : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-envelope-fill',
                    'name' => 'email',
                    'label' => __('Company email'),
                    'type' => 'email',
                    'value' => isset($settings) ? $settings->email : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-linkedin',
                    'name' => 'profile_linkedin',
                    'label' => __('Company Linkedin'),
                    'type' => 'url',
                    'value' => isset($settings) ? $settings->profile_linkedin : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-facebook',
                    'name' => 'profile_facebook',
                    'label' => __('Company Facebook'),
                    'type' => 'url',
                    'value' => isset($settings) ? $settings->profile_facebook : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-instagram',
                    'name' => 'profile_instagram',
                    'label' => __('Company Instagram'),
                    'type' => 'url',
                    'value' => isset($settings) ? $settings->profile_instagram : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-twitter',
                    'name' => 'profile_twitter',
                    'label' => __('Company Twitter'),
                    'type' => 'url',
                    'value' => isset($settings) ? $settings->profile_twitter : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-whatsapp',
                    'name' => 'whatsapp',
                    'label' => __('Company WhatsApp (add area code)'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->whatsapp : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-chat-quote-fill',
                    'name' => 'whatsapp_message',
                    'label' => __('Standard message for whatsapp'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->whatsapp_message : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-telegram',
                    'name' => 'telegram',
                    'label' => __('Company Telegram (Use username)'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->telegram : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-chat-quote-fill',
                    'name' => 'telegram_message',
                    'label' => __('Standard message for Telegram'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->telegram_message : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-c-circle-fill',
                    'name' => 'copyright',
                    'label' => __('Copyright in the website footer'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->copyright : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-facebook',
                    'name' => 'facebook_pixel',
                    'label' => __('Facebook pixel'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->facebook_pixel : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-tiktok',
                    'name' => 'tiktok_pixel',
                    'label' => __('Tiktok pixel'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->tiktok_pixel : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-google',
                    'name' => 'google_analytics_pixel',
                    'label' => __('Google analytics pixel'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->google_analytics_pixel : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-google',
                    'name' => 'googleads_pixel',
                    'label' => __('Google ads pixel'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->googleads_pixel : '',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-google',
                    'name' => 'tagmanager_pixel',
                    'label' => __('Google tagmanager pixel'),
                    'type' => 'text',
                    'value' => isset($settings) ? $settings->tagmanager_pixel : '',
                ]) ?>
            </div>

            <?php getAvailableLanguages() ?>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                    'icon' => 'bi bi-translate',
                    'name' => 'admin_lang',
                    'label' => __('Admin panel language'),
                    'value' => isset($settings) ? $settings->admin_lang : null,
                    'array' => getAvailableLanguages(),
                ]) ?>
            </div>

            <div class='w-full px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                    'name' => 'maintenance',
                    'label' => __('Enable maintenance mode (Inactive | Active)'),
                    'value' => isset($settings) ? $settings->maintenance : 'off',
                ]) ?>
            </div>

            <div class='w-full px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                    'name' => 'construction',
                    'label' => __('Enable build mode (Inactive | Active)'),
                    'value' => isset($settings) ? $settings->construction : 'off',
                ]) ?>
            </div>

            <div class='w-full px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                    'name' => 'cookies',
                    'label' => __('Enable cookie notice (Inactive | Active)'),
                    'value' => isset($settings) ? $settings->cookies : 'off',
                ]) ?>
            </div>

            <div class="w-full px-4">
                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                        'name' => 'preloader',
                        'label' => __('Activate preloader (Inactive | Active)'),
                        'value' => isset($settings) ? $settings->preloader : 'off',
                        'attributes' => 'onclick="Preloader.habilit(event);"',
                    ]) ?>

                    <p class="text-secondary"><?php _e('Preloader is an animation that runs until the page is loaded and ready to be displayed.') ?></p>
                </div>

                <div id="box-preloader" class="border border-color-main rounded" style="display: <?php echo !isset($settings) || $settings->preloader == 'off' ? 'none' : 'flex' ?>;">
                    <div class="p-2">
                        <p class="text-secondary"><?php _e('Choose an animation image') ?></p>
                    </div>

                    <div class="flex flex-wrap justify-center">
                        <?php foreach (getPreloaders() as $indice => $image) { ?>
                            <div class='m-2'>
                                <input data-checked="add-style" hidden type='radio' name='preloader_image' id='<?php echo $indice ?>' value='<?php echo $image['src'] ?>' <?php echo isset($settings) && $image['src'] == $settings->preloader_image ? 'checked' : '' ?>>
                                <label for='<?php echo $indice ?>' class='block rounded cursor-pointer w-[80px] h-[80px] border border-secondary'>
                                    <img class="w-full rounded" src="<?php asset("/assets/images/preloaders/{$image['src']}") ?>" alt="<?php echo $image['alt'] ?>">
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class='w-full flex flex-wrap mt-6 px-3'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                    'name' => 'site_logo_main',
                    'label' => __('Main logo (Main color)'),
                    'value' => (isset($settings) && !empty($settings->site_logo_main)) ? $settings->site_logo_main : null,
                    'type' => 'radio',
                ]) ?>

                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                    'name' => 'site_logo_secondary',
                    'label' => __('Secondary logo (in white)'),
                    'value' => (isset($settings) && !empty($settings->site_logo_secondary)) ? $settings->site_logo_secondary : null,
                    'type' => 'radio',
                ]) ?>

                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                    'name' => 'site_favicon',
                    'label' => __('Website favicon'),
                    'value' => (isset($settings) && !empty($settings->site_favicon)) ? $settings->site_favicon : null,
                    'type' => 'radio',
                ]) ?>

                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                    'name' => 'site_bg_login',
                    'label' => __('Login screen background'),
                    'value' => (isset($settings) && !empty($settings->site_bg_login)) ? $settings->site_bg_login : null,
                    'type' => 'radio',
                ]) ?>
            </div>
        </div>

        <div class='flex justify-end px-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-button', [
                'type' => 'submit',
                'style' => 'color-main',
                'title' => __('Save'),
                'value' => __('Save'),
            ]) ?>
        </div>
    </form>
</section>
