<?php
    use Src\Models\Gallery;

    $gallery = new Gallery();

    $requests = requests();
    $search = isset($requests->search) ? $requests->search : null;
    $images = !isset($search) ? $gallery->paginate(30) : $gallery->where('name', 'LIKE', "%{$search}%")->paginate(30);

    loadHtml(__DIR__.'/../../resources/admin/layout', [
        'color' => 'secondary',
        'type' => 'Visualizar',
        'icon' => 'bi bi-images',
        'title' => 'Galeria',
        'route_delete' => '/admin/gallery/delete',
        'route_search' => '/admin/gallery',
        'body' => __DIR__."/body/read",
        'data' => ['images' => $images, 'search' => $search]
    ]);

    function loadInFooter(): void
    {
        loadHtml(__DIR__.'/../../resources/partials/modal-delete');
        loadHtml(__DIR__.'/../../resources/partials/gallery-preview') ?>

        <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js?ver='.APP_VERSION) ?>"></script>

        <script type="text/javascript">
            const gallery = new Gallery("images[]", true);
        
            gallery.changeInputType('checkbox');
            gallery.dbClickPreview();
            gallery.next($('#image-preview'));
            gallery.previous($('#image-preview'));
            gallery.uploads()
        </script>
    <?php }
