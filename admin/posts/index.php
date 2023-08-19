<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\Gallery;
use Src\Models\Posts;

if(!isAuth()):
    return header('Location: /login', true, 302);
endif;

$method = empty(querys('method')) ? 'read' : querys('method');
$route_delete = $method == 'read' ? '/admin/posts/delete.php' : null;
$route_add = $method == 'create' ? null : '/admin/posts?method=create';

if($method == 'read'):
    $post = new Posts();
    $requests = requests();
    $posts = !isset($requests->search) ? $post->paginate(20) : $post->where('titles', 'LIKE', "%{$requests->search}%")->paginate(20);
    $color = 'cm-secondary';
    $text  = 'Visualizar';

    $data = ['posts' => $posts];
elseif($method == 'edit'):
    $post = new Posts();
    $galery = new Gallery();

    $post = $post->find(querys('id'));
    $color = 'cm-success';
    $text  = 'Editar';

    $data = ['post' => $post->data, 'images' => $post->images()->data];
elseif($method == 'create'):
    $color = 'cm-primary';
    $text  = 'Adicionar';

    $data = [];
endif;
?>

<!-- Include header -->
<?php getHtml(__DIR__.'/../../partials/header-main', ['title' => 'Posts', 'plugins' => ['tinymce']]) ?>
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps', [
                'color'        => $color,
                'type'         => $text,
                'icon'         => 'bi bi-pin-angle-fill',
                'title'        => 'Posts',
                'route_delete' => $route_delete,
                'route_add'    => $route_add,
                'route_search' => '/admin/posts'
            ]) ?>

            <?php getHtml(__DIR__."/body/{$method}", $data) ?>
        </section>
    </section>

    <!-- Include footer -->
    <?php getHtml(__DIR__.'/../../partials/footer') ?>
    <!-- Include modal gallery -->
    <?php getHtml(__DIR__.'/../../partials/gallery') ?>

    <!-- Tinymce start -->
    <script type="text/javascript" src="<?php asset('libs/tinymce/themes/silver/theme.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/models/dom/model.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/icons/default/icons.js?ver='.APP_VERSION) ?>"></script>

    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/image/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/codesample/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/emoticons/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/emoticons/js/emojis.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/charmap/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/autolink/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/anchor/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/wordcount/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/visualblocks/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/table/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/searchreplace/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/media/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/lists/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/link/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/code/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <!-- Tinymce end -->

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
</body>
</html>
