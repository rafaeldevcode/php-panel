<?php
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../suports/helpers.php';
?>

    <?php getHtml(__DIR__.'/../partials/header-main.php', ['title' => 'Políticas de privacidade']) ?>
    <?php getHtml(__DIR__.'/../partials/client/header.php')?>

    <main class="my-3">
        <section class="mx-width text0color-primary font-main-regular">
            <h1 class="fs-3 bg-cm-primary py-2 px-3 text-color-main text-center">Política Privacidade</h1>

            <p>A sua privacidade é importante para nós. É política do <b class="text-color-main"><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?></b> respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site <b class="text-color-main"><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?></b>, e outros sites que possuímos e operamos.</p>
        
            <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.</p>
        
            <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.</p>
        
            <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.</p>

            <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.</p>
        
            <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.</p>
        
            <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contacto connosco.</p>

            <h4>Compromisso do Usuário</h4>

            <p>O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o <b class="text-color-main"><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?></b> oferece no site e com caráter enunciativo, mas não limitativo:</p>
        
            <ol>
                <li> Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;</li>
                <li> Não difundir propaganda ou conteúdo de natureza racista, xenofóbica, betano apostas ou azar, qualquer tipo de pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;</li>
                <li> Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do <b class="text-color-main"><?php echo !is_null(SETTINGS) && !empty(SETTINGS['site_name']) ? SETTINGS['site_name'] : env('APP_NAME') ?></b>, de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.</li>
            </ol>
        
            <h4>Mais informações</h4>

            <p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos que você usa em nosso site.</p>
        
            <h5>Esta política é efetiva a partir de 7 April 2023 00:14</h5>
        
        
        
        
        
        
        </section>
    </main> 

    <?php getHtml(__DIR__.'/../partials/client/footer.php')?>
</body>
</html>
