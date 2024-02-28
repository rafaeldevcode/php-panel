<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route($action) ?>">
        <?php if (isset($user)) { ?>
            <input type="hidden" name="id" value="<?php echo $user->id ?>">
        <?php } ?>

        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-person-fill',
                    'name' => 'name',
                    'label' => __('Name'),
                    'type' => 'text',
                    'value' => isset($user) ? $user->name : null,
                    'attributes' => 'required',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-envelope-fill',
                    'name' => 'email',
                    'label' => __('Email'),
                    'type' => 'email',
                    'value' => isset($user) ? $user->email : null,
                    'attributes' => 'required',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'password',
                    'type' => 'password',
                    'label' => __("Enter the new password (Leave it blank if you don't want to change it"),
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

        <div class='w-full md:w-6/12 px-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                'name' => 'status',
                'label' => __('User status (Inactive | Active)'),
                'value' => isset($user) ? $user->status : null,
            ]) ?>
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
