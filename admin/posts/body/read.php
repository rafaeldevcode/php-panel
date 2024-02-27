<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <section>
        <div class="relative overflow-x-auto max-w-[2000px] mx-auto mb-4 rounded border">
            <table class="w-full text-xs text-left">
                <thead class="text-white uppercase bg-color-main">
                    <tr>
                        <th scope="col" class="p-2">
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
                        <th scope="col" class="p-2">
                            Nome
                        </th>
                        <th scope="col" class="p-2">
                            Status
                        </th>
                        <th scope="col" class="p-2 text-right">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts->data as $post) { ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input 
                                        value='<?php echo $post->id ?>' 
                                        data-message-delete='Esta ação irá remover todos os posts selecionados!'
                                        type='checkbox'
                                        data-button="delete-enable"
                                        id="checkbox-table-search-<?php echo $post->id ?>" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="checkbox-table-search-<?php echo $post->id ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope="row" class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $post->title ?>
                            </td>
                            <td class="p-2">
                                <span class="rounded text-xs text-light px-2 py-1 bg-<?php echo (is_null($post->status) || $post->status == 'off') ? 'danger' : 'primary' ?>">
                                    <?php echo (is_null($post->status) || $post->status == 'off') ? 'Inativo' : 'Ativo' ?>
                                </span>
                            </td>
                            <td class="flex items-center justify-end p-2 space-x-2 right">
                                <a target="_blank" rel="noopener" href="<?php route("/blog/{$post->slug}") ?>" title='Visualizar post <?php echo $post->title ?>' class='text-xs p-2 rounded btn-info text-light fw-bold'>
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <a href="<?php route("/admin/posts/?method=edit&id={$post->id}") ?>" title='Editar post <?php echo $post->title ?>' class='text-xs p-2 rounded btn-primary text-light fw-bold'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route='<?php route('/admin/posts/delete') ?>'
                                    data-delete-id='<?php echo $post->id ?>'
                                    data-message-delete='Esta ação irá remover o post "<?php echo $post->title ?>"!'
                                    type='button'
                                    title='Remover post <?php echo $post->title ?>'
                                    class='p-2 text-xs rounded btn-danger text-light fw-bold'
                                >
                                    <i class='bi bi-trash-fill'></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <?php if (count($posts->data) == 0) { ?>
            <div class="p-2 h-[300px] flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="Nenhum dado encontrado">
            </div>
        <?php } ?>
    </section>

    <?php if (isset($posts->page)) {
        loadHtml(__DIR__ . '/../../../resources/admin/partials/pagination', [
            'page' => $posts->page,
            'count' => $posts->count,
            'next' => $posts->next,
            'prev' => $posts->prev,
            'search' => $posts->search,
        ]);
    } ?>
</section>
