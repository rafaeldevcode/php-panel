<section class='px-3 py-4 bg-cm-light m-3 rounded shadow'>
    <section class='custom-table m-auto cm-browser-height'>
        <table class='table table-hover mb-0'>
            <thead>
                <tr class="bg-color-main text-cm-light">
                    <th class='col'>
                        <input type='checkbox' data-button="select-several" />
                    </th>
                    <th class='col'>Thumb</th>
                    <th class='col'>Nome</th>
                    <th class='col' data-row='email'>Email</th>
                    <th class='col'>Status</th>
                    <th class='col text-end'>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($users->data as $user): ?>
                    <tr>
                        <td class='col'>
                            <input
                                data-id='<?php echo $user->id ?>'
                                data-message-delete='Esta ação irá remover todos os usuários selecionados!'
                                type='checkbox'
                                data-button="delete-enable"
                            />
                        </td>
                        <th scope='row'>
                            <div class='user'>
                                <img class='w-100' src='<?php asset("assets/images/users/{$user->avatar}") ?>' alt='<?php echo $user->name ?>'>
                            </div>
                        </th>
                        <td><?php echo $user->name ?></td>
                        <td data-col='email'><?php echo $user->email ?></td>
                        <td>
                            <span class="badge bg-cm-<?php echo (is_null($user->status) || $user->status == 'off') ? 'danger' : 'primary' ?>"><?php echo (is_null($user->status) || $user->status == 'off') ? 'Inativo' : 'Ativo' ?></span>
                        </td>
                        <td class="text-end">
                            <a href="/admin/users/?method=edit&id=<?php echo $user->id ?>" title='Editar usuário <?php echo $user->name ?>' class='btn btn-sm btn-cm-primary text-cm-light fw-bold m-1'>
                                <i class='bi bi-pencil-square'></i>
                            </a>

                            <button
                                data-button="delete"
                                data-route='/admin/users/delete.php'
                                data-delete-id='<?php echo $user->id ?>'
                                data-message-delete='Esta ação irá remover o usuário "<?php echo $user->name ?>"!'
                                type='button'
                                title='Remover usuário <?php echo $user->name ?>'
                                class='btn btn-sm btn-cm-danger text-cm-light fw-bold m-1'
                            >
                                <i class='bi bi-trash-fill'></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if(count($users->data) == 0): ?>
            <div class="p-2 empty-collections d-flex justify-content-center align-items-center">
                <img class="h-100" src="<?php asset('assets/images/empty.svg') ?>" alt="Teste">
            </div>
        <?php endif; ?>
    </section>

    <?php if(isset($users->page)):
        getHtml(__DIR__.'/../../../partials/pagination.php', [
            'page'   => $users->page,
            'count'  => $users->count,
            'next'   => $users->next,
            'prev'   => $users->prev,
            'search' => $users->search
        ]);
    endif; ?>
    <?php getHtml(__DIR__.'/../../../partials/modal-delete.php') ?>
</section>
