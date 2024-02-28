<aside class='bg-secondary min-h-screen fixed md:relative z-[99999] md:z-[1] top-0 left-0 -translate-x-[100%] md:translate-x-0'>
    <?php loadHtml(__DIR__ . '/profile') ?>

    <nav class="sticky top-[61px]">
        <ul class='m-0 p-2'>
            <?php foreach (menusAdmin() as $menu) { ?>
                <li class='mainmenu flex flex-row items-center rounded relative border border-transparent hover:border-color-main ease-linear duration-300' data-item-menu='<?php echo path() == $menu['path'] ? 'active' : 'inactive' ?>'>
                    <?php if (isset($menu['count']) && $menu['count'] !== 0) { ?>
                        <span class="menu-count badge bg-danger absolute top-0 right-0 px-1 py-0 text-xs block rounded-full text-white font-bold"><?php echo $menu['count'] ?></span>
                    <?php } ?>

                    <div class='nav-icon text-color-main text-center w-full'>
                        <a href="<?php echo !isset($menu['submenus']) ? route($menu['path']) : '#' ?>" title="<?php echo $menu['title'] ?>" class='block font-bold text-light p-2'>
                            <div class='flex w-full'>
                                <i class='<?php echo $menu['icon'] ?> text-lg w-[25px]'></i>
                                <div class='ml-2 opacity-1 block md:opacity-0 md:hidden' data-item-active='false'>
                                    <?php echo $menu['title'] ?>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php if (isset($menu['submenus'])) { ?>
                        <ul class="submenu w-[130px] z-[100] hidden opacity-0 m-0 p-1 absolute bottom-0 right-0 bg-secondary rounded translate-x-[100%] ease-linear duration-300">
                            <?php foreach ($menu['submenus'] as $submenu) { ?>
                                <li class="rounded">
                                    <a class="text-light font-bold block rounded p-2 hover:bg-color-main ease-linear duration-300" href="<?php route($submenu['path']) ?>" title="<?php echo $submenu['title'] ?>">
                                        <?php echo $submenu['title'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php } ?>

            <li class='flex flex-row items-center rounded hover:bg-danger ease-linear duration-300' data-item-menu='inactive'>
                <div class='nav-icon text-color-main text-center w-full'>
                    <form action="<?php route('/login/logout') ?>" class='block font-bold p-2' method="POST">
                        <button type="submit" title="<?php _e('Log out') ?>" class='flex text-light w-full'>
                            <i class='bi bi-box-arrow-right text-lg w-[25px]'></i>
                            <div class='ml-2 opacity-1 block md:opacity-0 md:hidden' data-item-active='false'>
                                <?php _e('Log out') ?>
                            </div>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</aside>
<div id='div-closed'></div>
