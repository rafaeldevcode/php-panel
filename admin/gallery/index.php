<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

if(!isAuth()):
    return header('Location: /login', true, 302);
endif;

use Src\Models\Gallery;

$gallery = new Gallery();

$requests = requests();
$search = isset($requests->search) ? $requests->search : null;
$images = !isset($search) ? $gallery->paginate(30) : $gallery->where('name', 'LIKE', "%{$search}%")->paginate(30);

?>

<?php getHtml(__DIR__.'/../../partials/header-main', ['title' => 'Galeria']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps', [
                'color' => 'cm-secondary',
                'type' => 'Visualizar',
                'icon' => 'bi bi-images',
                'title' => 'Galeria',
                'route_delete' => '/admin/gallery/delete',
                'route_search' => '/admin/gallery'
            ]) ?>

            <?php getHtml(__DIR__."/body/read", ['images' => $images, 'search' => $search]) ?>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer') ?>
    <?php getHtml(__DIR__.'/../../partials/modal-delete') ?>
    <?php getHtml(__DIR__.'/../../partials/gallery-preview') ?>

    <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js?ver='.APP_VERSION) ?>"></script>

    <script type="text/javascript">
        const gallery = new Gallery("checkbox", "images[]", true);
        gallery.dbClickPreview();
        gallery.next($('#image-preview'));
        gallery.previous($('#image-preview'));

        $('#upload').click(async (event) => {
            event.preventDefault();

            await gallery.uploads();
        });
    </script>
</body>
</html>
