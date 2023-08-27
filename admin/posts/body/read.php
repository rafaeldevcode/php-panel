<section class='p-3 bg-cm-light m-0 sm:m-3 rounded shadow-lg'>
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
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                >
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
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
                    <?php foreach($posts->data as $post): ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input 
                                        value='<?php echo $post->id ?>' 
                                        data-message-delete='Esta ação irá remover todos os posts selecionados!'
                                        type='checkbox'
                                        data-button="delete-enable"
                                        id="checkbox-table-search-<?php echo $post->id ?>" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <label for="checkbox-table-search-<?php echo $post->id ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $post->title ?>
                            </td>
                            <td class="px-6 py-4">
                                <span class="rounded text-xs text-cm-light px-2 py-1 bg-cm-<?php echo (is_null($post->status) || $post->status == 'off') ? 'danger' : 'primary' ?>">
                                    <?php echo (is_null($post->status) || $post->status == 'off') ? 'Inativo' : 'Ativo' ?>
                                </span>
                            </td>
                            <td class="flex items-center justify-end px-6 py-4 space-x-2 right">
                                <a href="<?php route("/admin/posts/?method=edit&id={$post->id}") ?>" title='Editar post <?php echo $post->title ?>' class='text-xs p-2 rounded btn-primary text-cm-light fw-bold'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route='<?php route('/admin/posts/delete') ?>'
                                    data-delete-id='<?php echo $post->id ?>'
                                    data-message-delete='Esta ação irá remover o post "<?php echo $post->title ?>"!'
                                    type='button'
                                    title='Remover post <?php echo $post->title ?>'
                                    class='p-2 text-xs rounded btn-danger text-cm-light fw-bold'
                                >
                                    <i class='bi bi-trash-fill'></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <?php if(count($posts->data) == 0): ?>
            <div class="p-2 empty-collections flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="Nenhum dado encontrado">
            </div>
        <?php endif; ?>
    </section>

    <?php if(isset($posts->page)):
        loadHtml(__DIR__.'/../../../resources/partials/pagination', [
            'page'   => $posts->page,
            'count'  => $posts->count,
            'next'   => $posts->next,
            'prev'   => $posts->prev,
            'search' => $posts->search
        ]);
    endif; ?>
</section>
