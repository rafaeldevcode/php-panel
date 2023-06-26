<?php

    require __DIR__ .'/../../vendor/autoload.php';
    require __DIR__ . '/../../suports/helpers.php';

    use Src\Models\User;

    if(!isAuth()):
        return header('Location: /login', true, 302);
    endif;

    $method = empty(querys('method')) ? 'read' : querys('method');
    $route_delete = $method == 'read' ? '/admin/users/delete.php' : null;
    $route_add = $method == 'create' ? null : '/admin/users?method=create';

    if($method == 'read'):
        $user = new User();
        $requests = requests();
        $users = !isset($requests->search) ? $user->paginate(20) : $user->where('name', 'LIKE', "'%{$requests->search}%'")->paginate(20);
        $color = 'cm-secondary';
        $text  = 'Visualizar';

        $data = ['users' => $users];
    elseif($method == 'edit'):
        $user = new User();
        $user = $user->find(querys('id'));
        $color = 'cm-success';
        $text  = 'Editar';

        $data = ['user' => $user->data];
    elseif($method == 'create'):
        $color = 'cm-primary';
        $text  = 'Adicionar';

        $data = [];
    endif;
?>

<?php getHtml(__DIR__.'/../../partials/header-main.php', ['title' => 'Usuários']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar.php') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header.php') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps.php', [
                'color'        => $color,
                'type'         => $text,
                'icon'         => 'bi bi-people-fill',
                'title'        => 'Usuários',
                'route_delete' => $route_delete,
                'route_add'    => $route_add,
                'route_search' => '/admin/users'
            ]) ?>

            <?php getHtml(__DIR__."/body/{$method}.php", $data) ?>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer.php') ?>
</body>
</html>
