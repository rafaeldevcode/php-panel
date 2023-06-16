<header>
    <section class="bg-color-main py-2">
        <div class="mx-width d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <div>
                <ul class="m-0 p-0 d-flex flex-row list-unstyled">
                    <?php if(!is_null(SETTINGS) && !empty(SETTINGS['profile_instagram'])): ?>
                        <li class="mx-1">
                            <a title="Acessar nosso perfil no instagram" target="_blank" rel="noopener" href="<?php echo SETTINGS['profile_instagram'] ?>" class="text-decoration-none text-cm-light link-main"><i class="bi bi-instagram"></i></a>
                        </li>
                    <?php endif; ?>

                    <?php if(!is_null(SETTINGS) && !empty(SETTINGS['profile_facebook'])): ?>
                        <li class="mx-1">
                            <a title="Acessar nosso perfil no facebook" target="_blank" rel="noopener" href="<?php echo SETTINGS['profile_facebook'] ?>" class="text-decoration-none text-cm-light link-main"><i class="bi bi-facebook"></i></a>
                        </li>
                    <?php endif; ?>

                    <?php if(!is_null(SETTINGS) && !empty(SETTINGS['profile_linkedin'])): ?>
                        <li class="mx-1">
                            <a title="Acessar nosso perfil no linkedin" target="_blank" rel="noopener" href="<?php echo SETTINGS['profile_linkedin'] ?>" class="text-decoration-none text-cm-light link-main"><i class="bi bi-linkedin"></i></a>
                        </li>
                    <?php endif; ?>

                    <?php if(!is_null(SETTINGS) && !empty(SETTINGS['telegram'])): ?>                    
                        <li class="mx-1">
                            <a title="Mandar menssagens para nós no telegram" target="_blank" rel="noopener" href="https://t.me/<?php echo SETTINGS['telegram'] ?>" class="text-decoration-none text-cm-light link-main"><i class="bi bi-telegram"></i></a>
                        </li>
                    <?php endif; ?>

                    <!-- <li class="mx-1">
                        <button type="button" title="Pesquisar em nosso site" class="text-cm-light link-main border-0 bg-transparent p-0"><i class="bi bi-search"></i></button>
                    </li> -->
                </ul>
            </div>

            <div>
                <ul class="list-unstyled m-0 p-0 d-flex flex-wrap align-items-center justify-content-center">
                    <?php if(!is_null(SETTINGS) && !empty(SETTINGS['phone'])): ?>
                        <li class="mx-1">
                            <a id="phone-header" href="tel:+<?php echo preg_replace('/[^0-9]/', '', SETTINGS['phone']) ?>" title="Nosso telefone para contato" class="text-decoration-none text-cm-light link-main"><?php echo substr(SETTINGS['phone'], 4) ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(!is_null(SETTINGS) && !empty(SETTINGS['phone']) && !empty(SETTINGS['email'])): ?>
                        <li class="mx-1">
                            <span class="text-decoration-none text-cm-light">|</span>
                        </li>
                    <?php endif; ?>

                    <?php if(!is_null(SETTINGS) && !empty(SETTINGS['phone'])): ?>
                        <li class="mx-1">
                            <a title="Email dde conatato da onyx" href="mailto:<?php echo SETTINGS['email'] ?>" class="text-decoration-none text-cm-light link-main"><?php echo SETTINGS['email'] ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="mx-1">
                        <a title="Mais alguns links úteis" href="/#links-uteis" class="btn btn-sm btn-cm-primary rounded-pill px-3 text-uppercase py-1">Links Úteis</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-cm-light pt-2 pb-5">
        <div class="mx-width d-flex flex-row justify-content-between align-items-center">
            <div class="logo-client px-2">
                <a href="/" title="Voltar a página inicial">
                    <img class="w-100" src="<?php !is_null(SETTINGS) && !empty(SETTINGS['site_logo_main']) ? asset('assets/images/'.SETTINGS['site_logo_main'].'') : asset('assets/images/logo_main.png') ?>" alt="Logo da Onyx corretora">
                </a>
            </div>

            <nav class="navbar-client">
                <ul class="list-unstyled m-0 p-0 d-flex">
                    <?php foreach(getMenusNavbarClient() as $links): ?>
                        <li class="mx-2 text-uppercase d-flex flex-row client-submenu" data-menu-client='<?php echo  activeMenuClient($links['path']) ? 'active' : 'inactive' ?>'>
                            <a class="text-decoration-none text-cm-primary link-primary font-main-medium" <?php if(!isset($links['submenus'])): ?> href="<?php echo $links['path'] ?>" <?php endif; ?> title="<?php echo $links['title'] ?>"><?php echo $links['title'] ?></a>
                        
                            <?php if(isset($links['submenus'])): ?>
                                <ul class="list-unstyled m-0 p-0 position-absolute top-0 left-0 client-submenu-menu rounded border border-color-main bg-cm-light shadow">
                                    <?php foreach($links['submenus'][0] as $submenu): ?>
                                        <li class="m-1 text-uppercase">
                                            <a class="text-decoration-none p-1 d-block w-100 h-100 text-cm-primary link-primary font-main-medium" href="<?php echo $submenu['path'] ?>" title="<?php echo $submenu['title'] ?>"><?php echo $submenu['title'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <i class="bi bi-caret-down-fill"></i>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class='d-flex align-items-center px-2'>
                <form id='menu' class='menu menu-client'>
                    <input class='d-none menu_input_client' type='checkbox' id='checkbox-menu'>

                    <label class='position-relative d-block ms-2 menu_label_client' for="checkbox-menu">
                        <span class='position-absolute d-block rounded bg-color-main'>.</span>
                        <span class='position-absolute d-block rounded bg-color-main'>.</span>
                        <span class='position-absolute d-block rounded bg-color-main'>.</span>
                    </label>
                </form>
            </div>
        </div>
    </section>
</header>
