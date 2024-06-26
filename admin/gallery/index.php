<?php
use Src\Models\Gallery;

$gallery = new Gallery();

$requests = requests();
$search = isset($requests->search) ? $requests->search : null;
$images = !isset($search) ? $gallery->paginate(30) : $gallery->where('name', 'LIKE', "%{$search}%")->paginate(30);

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => 'bg-secondary',
    'type' => __('View'),
    'icon' => 'bi bi-images',
    'title' => __('Gallery'),
    'routeelete' => '/admin/gallery/delete',
    'route_search' => '/admin/gallery',
    'body' => __DIR__ . '/body/read',
    'data' => ['images' => $images, 'search' => $search],
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../resources/admin/partials/modal-delete');
    loadHtml(__DIR__ . '/../../resources/admin/partials/gallery-preview') ?>

        <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js') ?>"></script>

        <script type="text/javascript">
            const gallery = new Gallery();
        
            gallery.changeInputType('checkbox');
            gallery.dbClickPreview();
        </script>
    <?php }
