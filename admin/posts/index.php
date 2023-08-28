<?php
    autenticate();

    use Src\Models\Gallery;
    use Src\Models\Posts;

    $method = empty(querys('method')) ? 'read' : querys('method');

    if($method == 'read'):
        $post = new Posts();
        $requests = requests();
        $posts = !isset($requests->search) ? $post->paginate(20) : $post->where('titles', 'LIKE', "%{$requests->search}%")->paginate(20);
        $color = 'secondary';
        $text  = 'Visualizar';
        $body = __DIR__."/body/read";

        $data = ['posts' => $posts];
    elseif($method == 'edit'):
        $post = new Posts();
        $galery = new Gallery();

        $post = $post->find(querys('id'));
        $color = 'success';
        $text  = 'Editar';
        $body = __DIR__."/body/form";

        $data = ['action' => '/admin/posts/update', 'post' => $post->data, 'images' => $post->images()->data];
    elseif($method == 'create'):
        $color = 'primary';
        $text  = 'Adicionar';
        $body = __DIR__."/body/form";

        $data = ['action' => '/admin/posts/create'];
    endif;

    loadHtml(__DIR__.'/../../resources/admin/layout', [
        'color'        => $color,
        'type'         => $text,
        'icon'         => 'bi bi-pin-angle-fill',
        'title'        => 'Posts',
        'route_delete' => $method == 'read' ? '/admin/posts/delete' : null,
        'route_add'    => $method == 'create' ? null : '/admin/posts?method=create',
        'route_search' => '/admin/posts',
        'body' => $body,
        'data' => $data,
        'plugins' => ['tinymce']
    ]);

    function loadInFooter(): void
    {
        loadHtml(__DIR__.'/../../resources/partials/gallery');
        loadHtml(__DIR__.'/../../resources/partials/modal-delete') ?>

        <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js?ver='.APP_VERSION) ?>"></script>
        <script type="text/javascript">
            const gallery = new Gallery();
            gallery.openModalSelect($('[data-upload=thumbnail]'), 'radio');
            gallery.openModalSelect($('[data-upload=collection]'), 'checkbox');

            tinymce.init({
                selector: '#tinymce',
                language: 'pt_BR',
                height: 500,
                image_advtab: true,
                plugins: 'code anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat code',
                file_picker_callback: (callback, value, meta) => {
                    if(meta.filetype == 'image') {
                        (async () => {
                            const images = await gallery.selectedFilesTinymce('radio');

                            callback(images[0].url, { alt: images[0].alt, width: '100%', height: 'auto' }); 
                        })();
                    }
                }
            });
        </script>
    <?php }
