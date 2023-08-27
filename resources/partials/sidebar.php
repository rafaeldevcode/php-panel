<aside class='bg-cm-secondary sidebar'>
    <?php loadHtml(__DIR__.'/profile') ?>

    <nav>
        <ul class='m-0 p-2'>
            <?php foreach(menusAdmin() as $menu): ?>
                <li class='flex flex-row items-center rounded item-nav-sidbar relative' data-item-menu='<?php echo path() == $menu['path'] ? 'active' : 'inactive' ?>'>
                    <?php if(isset($menu['count']) && $menu['count'] !== 0): ?>
                        <span class="menu-count badge bg-danger absolute top-0 start-0 rounded-full"><?php echo $menu['count'] ?></span>
                    <?php endif; ?>

                    <div class='nav-icon text-color-main text-center w-full'>
                        <a href="<?php echo !isset( $menu['submenus'] ) ? route($menu['path']) : '' ?>" title="<?php echo $menu['title'] ?>" class='block font-bold text-cm-light'>
                            <div class='flex items-center w-full'>
                                <i class='<?php echo $menu['icon'] ?> text-lg iconManu'></i>
                                <div class='ml-2 hiddeItem dNone' data-item-active='false'>
                                    <?php echo $menu['title'] ?>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php if(isset($menu['submenus'])): ?>
                        <ul class="m-0 p-1 absolute bottom-0 right-0 submenu bg-cm-secondary rounded    ">
                            <?php foreach($menu['submenus'] as $submenu): ?>
                                <li class="submenu_li rounded">
                                    <a class="text-cm-light font-bold block rounded" href="<?php route($submenu['path']) ?>" title="<?php echo $submenu['title'] ?>">
                                        <?php echo $submenu['title'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>

            <li class='flex flex-row items-center rounded item-nav-sidbar-logout' data-item-menu='inactive'>
                <div class='nav-icon text-color-main text-center w-full'>
                    <form action="<?php route('/login/logout') ?>" class='d-block font-bold' method="POST">
                        <button type="submit" title="Fazer logout" class='flex items-center w-full text-cm-light'>
                            <i class='bi bi-box-arrow-right text-lg iconManu'></i>
                            <div class='ml-2 hiddeItem dNone' data-item-active='false'>
                                Logout
                            </div>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</aside>
<div id='divClosed'></div>
