<aside class='bg-cm-secondary sidebar'>
    <?php getHtml(__DIR__.'/profile') ?>

    <nav>
        <ul class='m-0 p-2'>
            <?php foreach(menusAdmin() as $menu): ?>
                <li class='d-flex flex-row align-items-center rounded item-nav-sidbar position-relative' data-item-menu='<?php echo path() == $menu['path'] ? 'active' : 'inactive' ?>'>
                    <?php if(isset($menu['count']) && $menu['count'] !== 0): ?>
                        <span class="menu-count badge bg-danger position-absolute top-0 start-0 rounded-pill"><?php echo $menu['count'] ?></span>
                    <?php endif; ?>

                    <div class='nav-icon text-color-main text-center w-100'>
                        <a <?php echo !isset( $menu['submenus'] ) ? 'href="'.$menu['path'].'"' : '' ?> title="<?php echo $menu['title'] ?>" class='text-decoration-none d-block fw-bold text-cm-light'>
                            <div class='d-flex align-items-center w-100'>
                                <i class='<?php echo $menu['icon'] ?> fs-5 iconManu'></i>
                                <div class='ms-2 hiddeItem dNone' data-item-active='false'>
                                    <?php echo $menu['title'] ?>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php if(isset($menu['submenus'])): ?>
                        <ul class="m-0 p-1 position-absolute bottom-0 end-0 submenu bg-cm-secondary rounded list-unstyled list-unstyled">
                            <?php foreach($menu['submenus'] as $submenu): ?>
                                <li class="submenu_li rounded">
                                    <a class="text-cm-light fw-bold text-decoration-none d-block rounded" href="<?php echo $submenu['path'] ?>" title="<?php echo $submenu['title'] ?>">
                                        <?php echo $submenu['title'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>

            <li class='d-flex flex-row align-items-center rounded item-nav-sidbar-logout' data-item-menu='inactive'>
                <div class='nav-icon text-color-main text-center w-100'>
                    <form action="/login/logout.php" class='d-block fw-bold' method="POST">
                        <button type="submit" title="Fazer logout" class='d-flex align-items-center w-100 text-cm-light'>
                            <i class='bi bi-box-arrow-right fs-5 iconManu'></i>
                            <div class='ms-2 hiddeItem dNone' data-item-active='false'>
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
