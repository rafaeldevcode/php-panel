<?php
    autenticate();

    use Src\Models\User;

    $user = new User();
    $user = $user->find($_SESSION['user_id'])->data;

    loadHtml(__DIR__.'/../../resources/admin/layout', [
        'color' => 'success',
        'type' => 'Editar',
        'icon' => 'bi bi-person-bounding-box',
        'title' => 'Perfil',
        'body' => __DIR__."/body/form",
        'data' => ['user' => $user],
    ]);

    function loadInFooter(): void
    { ?>
        <script type="text/javascript" src="<?php asset('assets/scripts/class/Modal.js?ver='.APP_VERSION) ?>"></script>
        <script type="text/javascript">
            $('[data-toggle="modal"]').on('click', () => {
                Modal.open('avatar');
            })
        </script>        
    <?php }
