<section class='p-3 bg-cm-light m-0 m-sm-3 rounded shadow'>
    <form method="POST" action="<?php echo $action ?>">
        <?php if(isset($user)): ?>
            <input type="hidden" name="id" value="<?php echo $user->id ?>">
        <?php endif ?>

        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-person-fill',
                    'name' => 'name',
                    'label' => 'Nome do usuário',
                    'type' => 'text',
                    'value' => isset($user) ? $user->name : null,
                    'attributes' => 'required'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-envelope-fill',
                    'name' => 'email',
                    'label' => 'Email',
                    'type' => 'email',
                    'value' => isset($user) ? $user->email : null,
                    'attributes' => 'required'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-pass', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'password',
                    'type' => 'password',
                    'label' => 'Digite a nova senha (Deixa em branco caso não queira alterar)'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-pass', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'repeat_password',
                    'type' => 'password',
                    'label' => 'Repita a nova senha'
                ]) ?>
            </div>
        </div>

        <div class='col-12 col-md-6'>
            <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-checkbox-switch', [
                'name' => 'status',
                'label' => 'Status do usuário (Inativo | Ativo)',
                'value' => isset($user) ? $user->status : null
            ]) ?>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <?php loadHtml(__DIR__.'/../../../resources/partials/form/input-button', [
                    'type' => 'submit',
                    'style' => 'color-main',
                    'title' => 'Savar usuário',
                    'value' => 'Salvar'
                ]) ?>
            </div>
        </div>
    </form>
</section>
