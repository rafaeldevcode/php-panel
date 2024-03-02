<header class='bg-color-main flex items-center w-full shadow-md h-[61px] sticky top-0 z-[2]'>
    <div class='flex justify-between items-center w-full'>
        <div class='flex items-center'>
            <form id='menu' class='menu'>
                <input class='hidden menu-input' type='checkbox' id='checkbox-menu'>

                <label class='relative block ml-2 menu-label cursor-pointer h-[18px] w-[25px] text-transparent' for="checkbox-menu">
                    <span class='absolute block rounded bg-light'>.</span>
                    <span class='absolute block rounded bg-light'>.</span>
                    <span class='absolute block rounded bg-light'>.</span>
                </label>
            </form>
        </div>

        <div class='flex items-center flex-nowrap'>
            <div class='h-[40px] w-auto my-auto'>
                <a href='<?php route('/admin/dashboard') ?>' title='<?php _e('Return to home page') ?>'>
                    <img class='h-full' src='<?php !is_null(SETTINGS) && !empty(SETTINGS['site_logo_secondary']) ? asset('assets/images/' . SETTINGS['site_logo_secondary'] . '') : asset('assets/images/logo_secondary.png') ?>' alt="Logo <?php echo env('APP_NAME') ?>" />
                </a>
            </div>
        </div>
    </div>

    <div class="ml-2 h-full">
        <a href="<?php route('/admin/settings') ?>" title="<?php _e('Settings') ?>" class="block p-2 flex items-center justify-center text-white h-full text-xs bg-secondary hover:text-color-main hover:bg-white ease-linear duration-300">
            <i class="bi bi-gear-fill"></i>
        </a>
    </div>
</header>
