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

<?php getHtml(__DIR__.'/../../partials/header-main', ['title' => 'Perfil']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps', [
                'color' => 'cm-success',
                'type' => 'Editar',
                'icon' => 'bi bi-person-bounding-box',
                'title' => 'Perfil'
            ]) ?>

            <?php getHtml(__DIR__."/body/edit", ['user' => $user]) ?>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer') ?>
    <?php getHtml(__DIR__.'/../../partials/modal-avatars', ['user_id' => $user->id, 'avatar' => $user->avatar]) ?>
</body>
</html>
