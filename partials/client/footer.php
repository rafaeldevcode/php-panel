<footer class="pt-5">
    <section class="bg-color-main py-5">
        <div class="mx-width d-flex justify-content-center flex-wrap align-items-center">
            <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 px-4">
                <a href="/" title="Voltar a página inicial">
                    <img class="w-100" src="<?php !is_null(SETTINGS) && !empty(SETTINGS['site_logo_secondary']) ? asset('assets/images/'.SETTINGS['site_logo_secondary']) : asset('assets/images/logo_secondary.png') ?>" alt="Logo da Seguradora Onyx">
                </a>
            </div>

            <?php if(issetContacts()): ?>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 px-1 text-center text-sm-start">
                    <div>
                        <h3 class="font-main-bold text-cm-light">Contatos</h3>
                        <ul class="m-0 p-0 list-unstyled">
                            <?php if(!is_null(SETTINGS) && !empty(SETTINGS['whatsapp'])): ?>
                                <li>
                                    <a class="text-decoration-none text-cm-light link-main" href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', SETTINGS['whatsapp']) ?>?text=<?php echo SETTINGS['whatsapp_message'] ?>" title="Envie-nos uma menssagem via whatsapp" rel="noopener" target="_blank">
                                        <i class="bi bi-whatsapp"></i>
                                        <span id="phone-whatsapp"><?php echo substr(SETTINGS['whatsapp'], 4) ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(!is_null(SETTINGS) && !empty(SETTINGS['phone'])): ?>
                                <li>
                                    <a class="text-decoration-none text-cm-light link-main" href="tel:+<?php echo preg_replace('/[^0-9]/', '', SETTINGS['phone']) ?>" title="Nosso telefone fixo">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="phone-footer"><?php echo substr(SETTINGS['phone'], 4) ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(!is_null(SETTINGS) && !empty(SETTINGS['email'])): ?>
                                <li>
                                    <a class="text-decoration-none text-cm-light link-main" href="mailto:<?php echo SETTINGS['email'] ?>" title="Envie-no um email">
                                        <i class="bi bi-envelope-fill"></i>
                                        <?php echo SETTINGS['email'] ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(issetSocialMedia()): ?>
                    <div class="mt-4">
                        <h3 class="text-cm-light font-main-bold">Redes Sociais</h3>
                        <ul class="m-0 p-0 d-flex flex-row justify-content-center justify-content-sm-start list-unstyled">
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
                                    <a title="Acessar nosso perfil no linkdin" target="_blank" rel="noopener" href="<?php echo SETTINGS['profile_linkedin'] ?>" class="text-decoration-none text-cm-light link-main"><i class="bi bi-linkedin"></i></a>
                                </li>
                            <?php endif; ?>

                            <?php if(!is_null(SETTINGS) && !empty(SETTINGS['telegram'])): ?>
                                <li class="mx-1">
                                    <a title="Mandar menssagens para nós no telegram" target="_blank" rel="noopener" href="https://t.me/<?php echo SETTINGS['telegram'] ?>?text=<?php echo SETTINGS['telegram_message'] ?>" class="text-decoration-none text-cm-light link-main"><i class="bi bi-telegram"></i></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(!is_null(SETTINGS) && !empty(SETTINGS['andress'])): ?>
                    <div class="mt-4">
                        <h3 class="text-cm-light font-main-bold">Endereço</h3>
                        <p class="mb-0 text-cm-light"><?php echo SETTINGS['andress'] ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 px-1 text-center text-sm-start">
                <h3 class="text-cm-light font-main-bold">Seguros</h3>
                <ul class="list-unstyled m-0 p-0">
                    <?php foreach(getLinksSafe() as $links): ?>
                        <li>
                            <a class="text-cm-light text-decoration-none link-main" href="<?php echo $links['path'] ?>" title="Seguro <?php echo $links['title'] ?>">Seguro <?php echo $links['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-lg-4 px-1">
                <div>
                    <ul class="list-unstyled m-0 p-0 text-center text-sm-start">
                        <li class="my-3">
                            <a class="text-cm-light text-decoration-none link-main" href="/previdencia-privada" title="Previdência Privada">Previdência Privada</a>
                        </li>
                        <li class="my-3">
                            <a class="text-cm-light text-decoration-none link-main" href="/planos-de-saude-odontologico" title="Planos de Saúde e Odontológicos">Planos de Saúde e Odontológicos</a>
                        </li>
                        <li class="my-3">
                            <a class="text-cm-light text-decoration-none link-main" href="/linhas-financeiras" title="Linhas Financeiras">Linhas Financeiras</a>
                        </li>
                    </ul>
                </div>

                <div class="mt-4 text-center text-sm-start">
                    <h3 class="text-cm-light font-main-bold mb-0 pb-0">Cadastre-se</h3>
                    <p class="mb-0 p-0 text-cm-light font-main-bold">e receba nossas novidades!</p>

                    <form action="/register.php" method="POST" class="mt-3 d-flex justify-content-center justify-content-sm-start flex-row">
                        <div class="position-relative d-flex justify-content-center justify-content-sm-start flex-row">
                            <input type="email" name="email" required placeholder="Email" class="m-0 bg-transparent border-2 border-cm-light px-2 py-1 text-cm-light font-main-bold">

                            <button type="submit" class="m-0 btn btn-sm bg-cm-light rounded-0">
                                <i class="bi bi-arrow-right"></i>
                            </button>
                            <span class='position-absolute end-0 bottom-0 validit'>Erro</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-cm-primary py-1">
        <div class="position-relative mx-width p-3">
            <p class="m-0 text-cm-light text-center fs-5"><?php echo !is_null(SETTINGS) && !empty(['copyright']) ? SETTINGS['copyright'] : 'Todos os direitos reservados' ?></p>

            <div class="logo-plugin">
                <a href="#" target="_blank" rel="noopener">
                    <img class="w-100" src="<?php asset('assets/images/plugin_sites.png') ?>" alt="Logon plugin sites">
                </a>
            </div>
        </div>
    </section>
</footer>

<?php !is_null(SETTINGS) && SETTINGS['cookies'] == 'on' ? getHtml(__DIR__.'/../alert-cookies.php') : '' ?>

<script type="text/javascript" src="<?php asset('libs/jquery/jquery.js?ver='.APP_VERSION)?>"></script>
<script type="text/javascript" src="<?php asset('libs/jquery/jquery.mask.min.js?ver='.APP_VERSION)?>"></script>
<script type="text/javascript" src="<?php asset('libs/bootstrap/bootstrap.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('libs/slick/slick/slick.js?ver='.APP_VERSION)?>"></script>

<script type="text/javascript" src="<?php asset('assets/scripts/class/Menu.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Message.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Password.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/ValidateForm.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Cookies.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/main.js?ver='.APP_VERSION) ?>"></script>

<script type="text/javascript">
    Menu.client($('#checkbox-menu'));
    Menu.removeClassLinksNavbar();
    Message.hidden('[data-message]');
    Password.show('[data-id-pass]');

    // Validate the form
    const validate = new ValidateForm();
    validate.init();

    $('#phone').mask('(00) 0 0000-0000');

    document.addEventListener("DOMContentLoaded", function(event) {
        $('#preloader-section').remove();
    });

    if(!Cookies.get('accept_cookies')){
        $('#accept-cookies').removeAttr('hidden');
        $('#accept-cookies').addClass('d-flex');

        $('#accept-cookies').addClass('show-alert-cookie');
        $('#accept-cookies').removeClass('hidden-alert-cookie');
    }

    $('#accept-cookies').find('button').click(() => {
        Cookies.set('accept_cookies', true, 3000, '/');

        $('#accept-cookies').addClass('hidden-alert-cookie');
        $('#accept-cookies').removeClass('show-alert-cookie');

        setInterval(() => {
            $('#accept-cookies').attr('hidden', true);
            $('#accept-cookies').removeClass('d-flex');
        }, 400);
    });
</script>
