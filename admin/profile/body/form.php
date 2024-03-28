<section class='p-3 bg-white m-0 sm:m-3 rounded shadow-sm'>
    <div class='relative'>
        <div class='relative profile-bg' style="background-image: url(<?php asset('assets/images/' . SETTINGS->site_bg_login) ?>)"></div>

        <div class='mx-auto relative w-[100px] h-[100px] mt-[-50px]'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/image', [
                'id' => $user->avatar,
                'alt' => $user->name,
                'class' => 'border border-color-main w-full h-full absolute bottom-0 left-0 rounded-full',
            ]) ?>
            
            <button
                class='absolute bottom-0 left-0 w-full h-full bg-white font-bold text-color-main rounded-full opacity-0 ease-linear duration-300 hover:opacity-100'
                data-toggle="modal-avatar"
                title="<?php _e('Change profile picture') ?>"
            >
                <?php _e('Change') ?>
            </button>
        </div>

        <div class='absolute top-0 left-0 m-3 text-color-main'>
            <p class='p-0 m-0 text-3xl font-bold'><?php echo $user->name ?></p>
        </div>

        <div class='absolute top-0 right-0 m-3'>
            <span class='text-light bg-<?php echo (is_null($user->status) || $user->status == 'off') ? 'danger' : 'primary' ?> rounded px-2 py-1 font-bold'>
                <i class='bi bi-circle-fill'></i>
                <?php echo (is_null($user->status) || $user->status == 'off') ? __('Inactive') : __('Active') ?>
            </span>
        </div>
    </div>

    <form method="POST" action="<?php route('/admin/profile/update') ?>">
        <input type="hidden" name="id" value="<?php echo $user->id ?>">

        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-person-fill',
                    'name' => 'name',
                    'label' => __('Name'),
                    'type' => 'bi bi-person-fill',
                    'value' => $user->name,
                    'attributes' => 'required',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-envelope-fill',
                    'name' => 'email',
                    'label' => __('Email'),
                    'type' => 'email',
                    'value' => $user->email,
                    'attributes' => [
                        'required' => 'required',
                        'disabled' => 'disabled',
                    ],
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'current_password',
                    'type' => 'password',
                    'label' => __('Current password (Leave it blank if you do not want to change it)'),
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'password',
                    'type' => 'password',
                    'label' => __('New Password'),
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'repeat_password',
                    'type' => 'password',
                    'label' => __('Repeat your new password'),
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

<?php loadHtml(__DIR__ . '/../../../resources/admin/partials/modal-avatars', ['user_id' => $user->id, 'avatar' => $user->avatar]) ?>
