<section class='p-3 bg-cm-light m-3 rounded shadow'>
    <form method="POST" action="/admin/users/update.php">
        <input type="hidden" name="id" value="<?php echo $user->id ?>">
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default.php', [
                    'icon' => 'bi bi-person-fill',
                    'name' => 'name',
                    'label' => 'Nome do usuário',
                    'type' => 'text',
                    'value' => $user->name,
                    'attributes' => 'required'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default.php', [
                    'icon' => 'bi bi-envelope-fill',
                    'name' => 'email',
                    'label' => 'Email',
                    'type' => 'email',
                    'value' => $user->email,
                    'attributes' => 'required'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-pass.php', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'password',
                    'type' => 'password',
                    'label' => 'Digite a nova senha (Deixa em branco caso não queira alterar)'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-pass.php', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'repeat_password',
                    'type' => 'password',
                    'label' => 'Repita a nova senha'
                ]) ?>
            </div>
        </div>

        <div class='col-12 col-md-6'>
            <?php getHtml(__DIR__.'/../../../partials/form/input-checkbox-switch.php', [
                'name' => 'status',
                'label' => 'Status do usuário (Inativo | Ativo)',
                'value' => $user->status
            ]) ?>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-button.php', [
                    'type' => 'submit',
                    'style' => 'color-main',
                    'title' => 'Savar usuário',
                    'value' => 'Salvar'
                ]) ?>
            </div>
        </div>
    </form>
</section>
