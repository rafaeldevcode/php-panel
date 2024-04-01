<footer class='p-4 border-t shadow-sm bg-white'>
    <div class="flex justify-between items-center flex-col md:flex-row">
        <div class='h-[30px] w-auto my-auto'>
            <a href='<?php route('/admin/dashboard') ?>' title='<?php _e('Return to home page') ?>'>
                <img class='h-full' src='<?php asset('assets/images/' . SETTINGS->site_logo_main) ?>' alt="Logo <?php echo SETTINGS->site_name ?>" />
            </a>
        </div>

        <div class='my-4 md:my-0'>
            <p class='font-bold text-secondary text-center'><?php echo SETTINGS->copyright ?></p>
        </div>
    </div>
</footer>
