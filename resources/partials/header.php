<header class='bg-color-main d-flex align-item-center w-100 p-2 shadow header'>
    <div class='d-flex justify-content-between align-items-center w-100'>
        <div class='d-flex align-items-center'>
            <form id='menu' class='menu'>
                <input class='d-none menu_input' type='checkbox' id='checkbox-menu'>

                <label class='position-relative d-block ms-2 menu_label' for="checkbox-menu">
                    <span class='position-absolute d-block rounded bg-cm-light'>.</span>
                    <span class='position-absolute d-block rounded bg-cm-light'>.</span>
                    <span class='position-absolute d-block rounded bg-cm-light'>.</span>
                </label>
            </form>
        </div>

        <div class='d-flex align-items-center flex-nowrap'>
            <div class='logo-header w-auto my-auto'>
                <a href='<?php route('/admin/dashboard') ?>' title='Voltar a página inicial'>
                    <img class='h-100' src='<?php !is_null(SETTINGS) && !empty(SETTINGS['site_logo_main']) ? asset('assets/images/'.SETTINGS['site_logo_secondary'].'') : asset('assets/images/logo_secondary.png') ?>' alt="Logo <?php echo env('APP_NAME') ?>" />
                </a>
            </div>
        </div>
    </div>
</header>
