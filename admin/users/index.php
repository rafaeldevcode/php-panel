<?php
    use Src\Models\User;

    $method = empty(querys('method')) ? 'read' : querys('method');

    if($method == 'read'):
        $user = new User();
        $requests = requests();
        $users = !isset($requests->search) ? $user->paginate(20) : $user->where('name', 'LIKE', "%{$requests->search}%")->paginate(20);
        $color = 'secondary';
        $text  = 'Visualizar';
        $body = __DIR__."/body/read";

        $data = ['users' => $users];
    elseif($method == 'edit'):
        $user = new User();
        $user = $user->find(querys('id'));
        $color = 'success';
        $text  = 'Editar';
        $body = __DIR__."/body/form";

        $data = ['user' => $user->data, 'action' => '/admin/users/update'];
    elseif($method == 'create'):
        $color = 'primary';
        $text  = 'Adicionar';
        $body = __DIR__."/body/form";

        $data = ['action' => '/admin/users/create'];
    endif;

    loadHtml(__DIR__.'/../../resources/admin/layout', [
        'color' => $color,
        'type' => $text,
        'icon' => 'bi bi-people-fill',
        'title' => 'Usuários',
        'route_delete' => $method == 'read' ? '/admin/users/delete' : null,
        'route_add' => $method == 'create' ? null : '/admin/users?method=create',
        'route_search' => '/admin/users',
        'body' => $body,
        'data' => $data,
    ]);

    function loadInFooter(): void
    {
        loadHtml(__DIR__.'/../../resources/admin/partials/modal-delete');
    }
