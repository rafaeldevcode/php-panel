<?php
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../suports/helpers.php';
?>

    <?php getHtml(__DIR__.'/../partials/header-main.php', ['title' => 'Quem Somos']) ?>
    <?php getHtml(__DIR__.'/../partials/client/header.php')?>

    <main class="my-3">
        <section class="bg-cm-grey-banner">
            <div class="mx-width d-flex flex-column flex-md-row justify-content-between align-items-start px-3 px-md-5">
                <div class="icone-banner">
                    <img class="w-100" src="<?php asset('assets/images/about.svg')?>" alt="Sobre nós">
                </div>

                <div class="col-md-12 col-lg-6 col-xl-7 p-x py-4 my-auto">
                    <h2 class="text-uppercase text-color-main font-main-regular">Quem somos</h2>
                    <p class="text-cm-primary fs-5">
                        Somos a ONYX CORRETORA DE SEGUROS, criada em 2021 e autorizada pela Susep. Executamos serviços de consultoria para vendas de produtos securitários, em nome de SEGURADORAS E OPERADORAS do mercado.
                    </p>

                    <div class="text-cm-primary">
                        <h5>Comercializamos:</h5>

                        <ul>
                            <li>Linhas de Seguros;</li>
                            <li>Planos de Saúde & Odonto;</li>
                            <li>Previdência;</li>
                            <li>Consórcios.</li>
                        </ul>
                    </div>

                    <p class="text-cm-primary fs-5">
                        Nosso compromisso é uma intermediação consultiva, garantindo a oferta dos melhores produtos e de acordo com a necessidade individual do cliente.
                    </p>

                    <h5 class="text-cm-primary">Como fazemos isso?!</h5>

                    <blockquote class="text-cm-primary ms-4">
                        Trabalhando com as melhores seguradoras e operadoras do mercado;
                        Prestando assessoria ao cliente desde a contratação até o fechamento do período segurado, pós-vendas, suporte na abertura de sinistro, renovações e encaminhando atualizações de cunho securitário;
                        Mantendo diretrizes internas capazes de cumprir as normas legais e regulamentares vigentes para suporte ao segurado, garantindo a solução de conflitos.
                    </blockquote>

                    <p class="text-cm-primary fs-5">
                        Contratar com a ONYX é sinônimo de cuidado e parceria, seja no produto ou atendimento, por isso vendemos para pessoas responsáveis e atentas ao futuro, capazes de entender que a gestão de riscos é fundamental para se ter segurança.
                    </p>
                    
                    <p class="text-cm-primary fs-5">
                        Sabendo que o mercado segurador está em constante transformação, aceitamos o desafio de demostrar ao segurado o que está sendo adquirido ao contratar uma apólice de seguro.
                    </p>

                    <p class="text-cm-primary fs-5">Performando para o segurado!</p>

                    <h2 class="text-uppercase text-color-main font-main-regular">MISSÃO</h2>

                    <p class="text-cm-primary fs-5">
                        Comercializar Seguros e Planos capazes de subsidiar os interesses dos clientes, contribuindo para estabilidade e qualidade de vida de cada um dos beneficiários e/ segurados, respeitando as peculiaridades/particularidades individuais.
                    </p>

                    <h2 class="text-uppercase text-color-main font-main-regular">VALORES</h2>

                    <p class="text-cm-primary fs-5">Responsabilidade social I Transparência I Ética I Performance</p>

                    <h2 class="text-uppercase text-color-main font-main-regular">VISÃO</h2>

                    <p class="text-cm-primary fs-5">
                        Ser uma empresa reconhecida pela qualidade no atendimento e na prestação de serviços do mercado securitário e de planos de saúde, comprometida com a satisfação de seus clientes e colaboradores.
                    </p>
                </div>
            </div>
        </section>
    </main> 

    <?php getHtml(__DIR__.'/../partials/client/footer.php')?>
</body>
</html>
