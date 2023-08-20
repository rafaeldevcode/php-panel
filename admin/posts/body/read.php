<section class='px-3 py-4 bg-cm-light m-3 rounded shadow'>
    <section class='custom-table m-auto cm-browser-height'>
        <table class='table table-hover mb-0'>
            <thead>
                <tr class="bg-color-main text-cm-light">
                    <th class='col'>
                        <input type='checkbox' data-button="select-several" />
                    </th>
                    <th class='col'>Nome</th>
                    <th class='col'>Status</th>
                    <th class='col text-end'>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($posts->data as $post): ?>
                    <tr>
                        <td class='col'>
                            <input
                                data-id='<?php echo $post->id ?>'
                                data-message-delete='Esta ação irá remover todos os posts selecionados!'
                                type='checkbox'
                                data-button="delete-enable"
                            />
                        </td>
                        <td><?php echo $post->title ?></td>
                        <td>
                            <span class="badge bg-cm-<?php echo (is_null($post->status) || $post->status == 'off') ? 'danger' : 'primary' ?>"><?php echo (is_null($post->status) || $post->status == 'off') ? 'Inativo' : 'Ativo' ?></span>
                        </td>
                        <td class="text-end text-nowrap">
                            <a href="<?php route("/admin/posts/?method=edit&id={$post->id}") ?>" title='Editar post <?php echo $post->title ?>' class='btn btn-sm btn-cm-primary text-cm-light fw-bold m-1'>
                                <i class='bi bi-pencil-square'></i>
                            </a>

                            <button
                                data-button="delete"
                                data-route='<?php route('/admin/posts/delete.php') ?>'
                                data-delete-id='<?php echo $post->id ?>'
                                data-message-delete='Esta ação irá remover o post "<?php echo $post->title ?>"!'
                                type='button'
                                title='Remover post <?php echo $post->title ?>'
                                class='btn btn-sm btn-cm-danger text-cm-light fw-bold m-1'
                            >
                                <i class='bi bi-trash-fill'></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if(count($posts->data) == 0): ?>
            <div class="p-2 empty-collections d-flex justify-content-center align-items-center">
                <img class="h-100" src="<?php asset('assets/images/empty.svg') ?>" alt="Teste">
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
    <?php loadHtml(__DIR__.'/../../../resources/partials/modal-delete') ?>
</section>
