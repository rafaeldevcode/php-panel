<footer class='p-4 border-t shadow-sm bg-white'>
    <div class="flex justify-between items-center flex-col md:flex-row">
        <div class='h-[30px] w-auto my-auto'>
            <a href='<?php route('/admin/dashboard') ?>' title='Voltar a página inicial'>
                <img class='h-full' src='<?php !is_null(SETTINGS) && !empty(SETTINGS['site_logo_main']) ? asset('assets/images/' . SETTINGS['site_logo_main'] . '') : asset('assets/images/logo_secondary.png') ?>' alt="Logo <?php echo env('APP_NAME') ?>" />
            </a>
        </div>

        <div class='my-4 md:my-0'>
            <p class='font-bold text-secondary text-center'><?php echo !is_null(SETTINGS) && !empty(['copyright']) ? SETTINGS['copyright'] : '' ?></p>
        </div>
    </div>
</footer>
