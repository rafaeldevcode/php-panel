<section class='p-3 bg-cm-light m-0 m-sm-3 rounded shadow'>
    <form method="POST" action="/admin/users/create.php">
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-person-fill',
                    'name' => 'name',
                    'label' => 'Nome do usuário',
                    'type' => 'text',
                    'attributes' => 'required'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-default', [
                    'icon' => 'bi bi-envelope-fill',
                    'name' => 'email',
                    'label' => 'Email',
                    'type' => 'email',
                    'attributes' => 'required'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-pass', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'password',
                    'type' => 'password',
                    'label' => 'Senha',
                    'attributes' => 'required'
                ]) ?>
            </div>

            <div class='col-12 col-md-6'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-pass', [
                    'icon' => 'bi bi-key-fill',
                    'name' => 'repeat_password',
                    'type' => 'password',
                    'label' => 'Repita a sua senha',
                    'attributes' => 'required',
                ]) ?>
            </div>
        </div>

        <div class='col-12 col-md-6'>
            <?php getHtml(__DIR__.'/../../../partials/form/input-checkbox-switch', [
                'name' => 'status',
                'label' => 'Status do usuário (Inativo | Ativo)'
            ]) ?>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <?php getHtml(__DIR__.'/../../../partials/form/input-button', [
                    'type' => 'submit',
                    'style' => 'color-main',
                    'title' => 'Savar usuário',
                    'value' => 'Salvar'
                ]) ?>
            </div>
        </div>
    </form>
</section>
