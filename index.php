<?php
    require __DIR__ . '/vendor/autoload.php';
    require __DIR__ . '/suports/helpers.php';
?>

    <?php getHtml(__DIR__.'/partials/header-main.php', ['title' => 'Home']) ?>
    <?php getHtml(__DIR__.'/partials/client/header.php')?>

    <main class="my-3">
        <section class="bg-cm-grey-banner">
            <div class="mx-width d-flex flex-column flex-md-row justify-content-between align-items-start px-3 px-md-5">
                <div class="icone-banner">
                    <img class="w-100" src="<?php asset('assets/images/icones-banner.png')?>" alt="Banner com ícones dos nossos produtos">
                </div>

                <div class="col-md-12 col-lg-6 col-xl-7 p-x py-4 my-auto">
                    <p class="text-cm-primary fs-5 mb-0">Seja muito bem-vindo a Onyx Corretora de Seguros.</p>
                    <p class="text-cm-primary fs-5 mb-0">É um prazer tê-lo aqui!</p>
                    <p class="text-cm-primary fs-5 mb-0">Comercializamos produtos dos ramos securitário e saúde, atuando de forma independente.</p>
                    <p class="text-cm-primary fs-5 mb-0">O nosso objetivo e compromisso é vender com segurança e responsabilidade. </p>
                    <p class="text-cm-primary fs-5 mb-0">Quer saber mais? Navegue e peça-nos uma cotação, preenchendo o formulário do produto. </p>
                    <p class="text-cm-primary fs-5 mb-0">Performando para o segurado!</p>
                </div>
            </div>
        </section>

        <section class="bg-cm-light py-5">
            <h2 class="text-cm-primary font-main-bold text-center mt-5">Nossos Seguros</h2>
            <p class="text-cm-primary text-center mb-5">Covidamos você para conhecer mais sobre nossos serviços:</p>

            <div class="mx-width">
                <ul class="m-0 p-0 d-flex flex-row justify-content-evenly text-center list-unstyled" id="slid-safes">
                    <?php foreach(getSafes() as $safe): ?>
                        <li class="card-safes border-bottom border-4 border-cm-secondary">
                            <a href="<?php echo $safe['href'] ?>" title="<?php echo $safe['alt'] ?>" class="text-decoration-none text-cm-dark">
                                <div class="mb-5 card-safes-image border border-4 bg-cm-grey border-cm-grey rounded-circle d-flex justify-content-center align-items-center m-auto">
                                    <img src="<?php asset($safe['image']) ?>" alt="<?php echo $safe['alt'] ?>">
                                </div>

                                <div>
                                    <h3><?php echo $safe['title'] ?></h3>
                                    <p><?php echo $safe['description'] ?></p>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section class="bg-cm-ligt py-5" id="links-uteis">
            <h2 class="text-cm-primary font-main-bold text-center my-5">Links Úteis</h2>

            <div class="mx-width">
                <ul class="m-0 p-0 d-flex flex-row justify-content-evenly align-item-center list-unstyled" id="slid-finan">
                    <?php foreach(getUsefulLinks() as $links): ?>
                        <li class="mx-2 logo-finan">
                            <img class="w-100" src="<?php asset($links['image']) ?>" alt="<?php echo $links['alt'] ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>

    <?php getHtml(__DIR__.'/partials/client/footer.php')?>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Carousel.js?ver='.APP_VERSION) ?>"></script>

    <script type="text/javascript">
        // Active carousel
        Carousel.slidFin();
        Carousel.slidSafes();
    </script>
</body>
</html>
