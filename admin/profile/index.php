<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\User;

if(!isAuth()):
    return header('Location: /login', true, 302);
endif;

$user = new User();
$user = $user->find($_SESSION['user_id'])->data;

?>

<?php getHtml(__DIR__.'/../../partials/header-main.php', ['title' => 'Perfil']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar.php') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header.php') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps.php', [
                'color' => 'cm-success',
                'type' => 'Editar',
                'icon' => 'bi bi-person-bounding-box',
                'title' => 'Perfil'
            ]) ?>

            <section class='p-3 bg-cm-light m-3 rounded shadow'>
                <div class='position-relative'>
                    <div class='position-relative profile-bg' style="background-image: url(<?php !is_null(SETTINGS) && !empty(SETTINGS['site_bg_login']) ? asset('assets/images/'.SETTINGS['site_bg_login'].'') : asset('assets/images/login_bg.jpg') ?>)"></div>

                    <div class='mx-auto position-relative profile-user'>
                        <img class='border border-color-main w-100 position-absolute bottom-0 left-0' src='<?php asset('/assets/images/users/'.$user->avatar) ?>' alt='<?php echo $user->name ?>'/>

                        <button
                            class='position-absolute bottom-0 left-0 w-100 h-100 bg-cm-light profile-user-btn'
                            data-bs-toggle="modal"
                            data-bs-target="#avatar"
                        >
                            <span class='text-color-main fw-bold'>Alterar</span>
                        </button>
                    </div>

                    <div class='position-absolute top-0 start-0 m-3 text-color-main'>
                        <p class='p-0 m-0 display-4 fw-bold'><?php echo $user->name ?></p>
                    </div>

                    <div class='position-absolute top-0 end-0 m-3'>
                        <span class='text-cm-light bg-cm-<?php echo (is_null($user->status) || $user->status == 'off') ? 'danger' : 'primary' ?> badge badge-sm fw-bold'>
                            <i class='bi bi-circle-fill'></i>
                            <?php echo (is_null($user->status) || $user->status == 'off') ? 'Inativo' : 'Ativo' ?>
                        </span>
                    </div>
                </div>

                <form method="POST" action="/admin/profile/update.php">
                    <input type="hidden" name="id" value="<?php echo $user->id ?>">
                    <div class='row d-flex justify-content-between'>
                        <div class='col-12 col-md-6'>
                            <?php getHtml(__DIR__.'/../../partials/form/input-default.php', [
                                'icon' => 'bi bi-envelope-fill',
                                'name' => 'name',
                                'label' => 'Nome do usuário',
                                'type' => 'bi bi-person-fill',
                                'value' => $user->name,
                                'attributes' => 'required'
                            ]) ?>
                        </div>

                        <div class='col-12 col-md-6'>
                            <?php getHtml(__DIR__.'/../../partials/form/input-default.php', [
                                'icon' => 'bi bi-envelope-fill',
                                'name' => 'email',
                                'label' => 'Email',
                                'type' => 'email',
                                'value' => $user->email,
                                'attributes' => 'required disabled'
                            ]) ?>
                        </div>

                        <div class='col-12 col-md-6'>
                            <?php getHtml(__DIR__.'/../../partials/form/input-pass.php', [
                                'icon' => 'bi bi-key-fill',
                                'name' => 'current_password',
                                'type' => 'password',
                                'label' => 'Senha atual (Deixe em branco caso não queira altera-la)'
                            ]) ?>
                        </div>

                        <div class='col-12 col-md-6'>
                            <?php getHtml(__DIR__.'/../../partials/form/input-pass.php', [
                                'icon' => 'bi bi-key-fill',
                                'name' => 'password',
                                'type' => 'password',
                                'label' => 'Nova senha'
                            ]) ?>
                        </div>

                        <div class='col-12 col-md-6'>
                            <?php getHtml(__DIR__.'/../../partials/form/input-pass.php', [
                                'icon' => 'bi bi-key-fill',
                                'name' => 'repeat_password',
                                'type' => 'password',
                                'label' => 'Repita sua nova senha'
                            ]) ?>
                        </div>
                    </div>

                    <div class='row d-flex justify-content-end'>
                        <div class='col-12 col-md-3'>
                            <?php getHtml(__DIR__.'/../../partials/form/input-button.php', [
                                'type' => 'submit',
                                'style' => 'color-main',
                                'title' => 'Savar usuário',
                                'value' => 'Salvar'
                            ]) ?>
                        </div>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer.php') ?>
    <?php getHtml(__DIR__.'/../../partials/modal-avatars.php', ['user_id' => $user->id, 'avatar' => $user->avatar]) ?>
</body>
</html>
