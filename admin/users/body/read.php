<section class='px-3 py-4 bg-cm-light m-0 m-sm-3 rounded shadow'>
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
                                value='<?php echo $user->id ?>'
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
                        <td class="text-end text-nowrap">
                            <a href="<?php route("/admin/users/?method=edit&id={$user->id}") ?>" title='Editar usuário <?php echo $user->name ?>' class='btn btn-sm btn-cm-primary text-cm-light fw-bold m-1'>
                                <i class='bi bi-pencil-square'></i>
                            </a>

                            <button
                                data-button="delete"
                                data-route='<?php route('/admin/users/delete.php') ?>'
                                data-delete-id='<?php echo $user->id ?>'
                                data-message-delete='Esta ação irá remover o usuário "<?php echo $user->name ?>"!'
                                type='button'
                                title='Remover usuário <?php echo $user->name ?>'
                                class='btn btn-sm btn-cm-danger text-cm-light fw-bold m-1'
                            >
                                <i class='bi bi-trash-fill'></i>
                            </button>
                            <form action="<?php route('/login/logout.php') ?>" method="POST" class="m-1 d-inline">
                                <input type="hidden" name="id" value="<?php echo $user->id ?>">
                                <button
                                    type='submit'
                                    title='Deslogar usuário <?php echo $user->name ?>'
                                    class='btn btn-sm btn-cm-<?php echo $user->id == $_SESSION['user_id'] ? 'secondary' : 'info' ?> text-cm-light fw-bold'
                                    <?php echo $user->id == $_SESSION['user_id'] ? 'disabled' : '' ?>
                                >
                                    <i class="bi bi-box-arrow-right"></i>
                                </button>
                            </form>
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
        loadHtml(__DIR__.'/../../../resources/partials/pagination', [
            'page' => $users->page,
            'count' => $users->count,
            'next' => $users->next,
            'prev' => $users->prev,
            'search' => $users->search
        ]);
    endif; ?>
    
    <?php loadHtml(__DIR__.'/../../../resources/partials/modal-delete') ?>
</section>
