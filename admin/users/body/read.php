<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <section class='custom-table m-auto cm-browser-height'>
        <div class="relative overflow-x-auto rounded border">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-color-main">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input 
                                    data-button="select-several"
                                    id="checkbox-all-search" 
                                    type="checkbox" 
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                >
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Thumb
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users->data as $user): ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input 
                                        value='<?php echo $user->id ?>' 
                                        data-message-delete='Esta ação irá remover todos os usuários selecionados!'
                                        type='checkbox'
                                        data-button="delete-enable"
                                        id="checkbox-table-search-<?php echo $user->id ?>" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="checkbox-table-search-<?php echo $user->id ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope='row'>
                                <div class='user'>
                                    <img class='w-100' src='<?php asset("assets/images/users/{$user->avatar}") ?>' alt='<?php echo $user->name ?>'>
                                </div>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $user->name ?>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $user->email ?>
                            </td>
                            <td class="px-6 py-4">
                                <span class="rounded text-xs text-light px-2 py-1 bg-<?php echo (is_null($user->status) || $user->status == 'off') ? 'danger' : 'primary' ?>">
                                    <?php echo (is_null($user->status) || $user->status == 'off') ? 'Inativo' : 'Ativo' ?>
                                </span>
                            </td>
                            <td class="flex items-center justify-end px-6 py-4 space-x-2 right">
                                <a href="<?php route("/admin/users/?method=edit&id={$user->id}") ?>" title='Editar usuário <?php echo $user->name ?>' class='text-xs p-2 rounded btn-primary text-light fw-bold'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route='<?php route('/admin/users/delete') ?>'
                                    data-delete-id='<?php echo $user->id ?>'
                                    data-message-delete='Esta ação irá remover o usuário "<?php echo $user->name ?>"!'
                                    type='button'
                                    title='Remover usuário <?php echo $user->name ?>'
                                    class='p-2 text-xs rounded btn-danger text-light fw-bold'
                                >
                                    <i class='bi bi-trash-fill'></i>
                                </button>

                                <form action="<?php route('/login/logout') ?>" method="POST" class="m-1 d-inline">
                                    <input type="hidden" name="id" value="<?php echo $user->id ?>">
                                    <button
                                        type='submit'
                                        title='Deslogar usuário <?php echo $user->name ?>'
                                        class='p-2 text-xs rounded pointer btn-<?php echo $user->id == $_SESSION['user_id'] ? 'secondary' : 'info' ?> text-light'
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
        </div>

        <?php if(count($users->data) == 0): ?>
            <div class="p-2 empty-collections flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="Nenhum dado encontrado">
            </div>
        <?php endif; ?>
    </section>

    <?php if(isset($users->page)):
        loadHtml(__DIR__.'/../../../resources/admin/partials/pagination', [
            'page' => $users->page,
            'count' => $users->count,
            'next' => $users->next,
            'prev' => $users->prev,
            'search' => $users->search
        ]);
    endif; ?>
</section>
