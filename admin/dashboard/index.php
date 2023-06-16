<?php 
    require __DIR__ .'/../../vendor/autoload.php';
    require __DIR__ . '/../../suports/helpers.php';

    if(!isAuth()):
        return header('Location: /login', true, 302);
    endif;

    use Src\Models\SafeGeneralRisks;
    use Src\Models\SafeVehicles;
    use Src\Models\FinancialLines;
    use Src\Models\HealthPlans;
    use Src\Models\PrivatePension;
    use Src\Models\SafeAereo;
    use Src\Models\SafeCivilResponsability;
    use Src\Models\SafeCredit;
    use Src\Models\SafeCyberRisks;
    use Src\Models\SafeDeo;
    use Src\Models\SafeEeo;
    use Src\Models\SafeEnvironmentalRisks;
    use Src\Models\SafeFinancialRisk;
    use Src\Models\SafeHousing;
    use Src\Models\SafeHull;
    use Src\Models\SafeMaritime;
    use Src\Models\SafePatrimonial;
    use Src\Models\SafePeople;
    use Src\Models\SafeRural;
    use Src\Models\SafeTransport;

    $private_pension = new PrivatePension();
    $health_plans = new HealthPlans();
    $financial_lines = new FinancialLines();
    $safe_aereo = new SafeAereo();
    $safe_hull = new SafeHull();
    $safe_credit = new SafeCredit();
    $safe_housing = new SafeHousing();
    $safe_maritime = new SafeMaritime();
    $safe_patrimonial = new SafePatrimonial();
    $safe_people = new SafePeople();
    $safe_civil_responsability = new SafeCivilResponsability();
    $safe_financial_risk = new SafeFinancialRisk();
    $safe_rural = new SafeRural();
    $safe_transport = new SafeTransport();
    $safe_cyber_risks = new SafeCyberRisks();
    $safe_deo = new SafeDeo();
    $safe_eeo = new SafeEeo();
    $safe_environmental_risks = new SafeEnvironmentalRisks();
    $safe_general_risks = new SafeGeneralRisks();
    $safe_vehicles = new SafeVehicles();
    $empty = true;

    $data = [
        [
            'title' => 'Previdência privada',
            'count' => $private_pension->count('status', 'on'),
            'model' => 'Src\Models\PrivatePension'
        ],
        [
            'title' => 'Planos de saúde',
            'count' => $health_plans->count('status', 'on'),
            'model' => 'Src\Models\HealthPlans'
        ],
        [
            'title' => 'Linhas financeiras',
            'count' => $financial_lines->count('status', 'on'),
            'model' => 'Src\Models\FinancialLines'
        ],
        [
            'title' => 'Aéreo',
            'count' => $safe_aereo->count('status', 'on'),
            'model' => 'Src\Models\SafeAereo'
        ],
        [
            'title' => 'Auto/Frota/Moto',
            'count' => $safe_vehicles->count('status', 'on'),
            'model' => 'Src\Models\SafeVehicles'
        ],
        [
            'title' => 'Casco',
            'count' => $safe_hull->count('status', 'on'),
            'model' => 'Src\Models\SafeHull'
        ],
        [
            'title' => 'Crédito',
            'count' => $safe_credit->count('status', 'on'),
            'model' => 'Src\Models\SafeCredit'
        ],
        [
            'title' => 'Habitação',
            'count' => $safe_housing->count('status', 'on'),
            'model' => 'Src\Models\SafeHousing'
        ],
        [
            'title' => 'Marítimo',
            'count' => $safe_maritime->count('status', 'on'),
            'model' => 'Src\Models\SafeMaritime'
        ],
        [
            'title' => 'Patrimônial',
            'count' => $safe_patrimonial->count('status', 'on'),
            'model' => 'Src\Models\SafePatrimonial'
        ],
        [
            'title' => 'Pessoas',
            'count' =>  $safe_people->count('status', 'on'),
            'model' => 'Src\Models\SafePeople'
        ],
        [
            'title' => 'Responsabilidade cívil',
            'count' => $safe_civil_responsability->count('status', 'on'),
            'model' => 'Src\Models\SafeCivilResponsability'
        ],
        [
            'title' => 'Risco financeiro',
            'count' => $safe_financial_risk->count('status', 'on'),
            'model' => 'Src\Models\SafeFinancialRisk'
        ],
        [
            'title' => 'Rural',
            'count' => $safe_rural->count('status', 'on'),
            'model' => 'Src\Models\SafeRural'
        ],
        [
            'title' => 'Transportes',
            'count' => $safe_transport->count('status', 'on'),
            'model' => 'Src\Models\SafeTransport'
        ],
        [
            'title' => 'Riscos cibernéticos',
            'count' => $safe_cyber_risks->count('status', 'on'),
            'model' => 'Src\Models\SafeCyberRisks'
        ],
        [
            'title' => 'D&O',
            'count' => $safe_deo->count('status', 'on'),
            'model' => 'Src\Models\SafeDeo'
        ],
        [
            'title' => 'E&O',
            'count' => $safe_eeo->count('status', 'on'),
            'model' => 'Src\Models\SafeEeo'
        ],
        [
            'title' => 'Riscos hambientais',
            'count' => $safe_environmental_risks->count('status', 'on'),
            'model' => 'Src\Models\SafeEnvironmentalRisks'
        ],
        [
            'title' => 'Riscos em geral',
            'count' => $safe_general_risks->count('status', 'on'),
            'model' => 'Src\Models\SafeGeneralRisks'
        ]
    ]
?>

<?php getHtml(__DIR__.'/../../partials/header-main.php', ['title' => 'Dashboard']) ?>

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <?php getHtml(__DIR__.'/../../partials/sidebar.php') ?>

        <section class='w-100'>
            <?php getHtml(__DIR__.'/../../partials/header.php') ?>

            <?php getHtml(__DIR__.'/../../partials/breadcrumps.php', [
                'color' => 'cm-secondary',
                'type'  => 'Visualizar',
                'icon'  => 'bi bi-speedometer',
                'title' => 'Dashboard'
            ]) ?>

            <section class='p-3 bg-cm-light m-3 rounded shadow'>
                <h1 class="text-cm-primary mb-4">Cotações não visualizadas</h1>

                <div class='rounded border-color-main border d-flex justify-content-evenly align-items-center flex-wrap cm-browser-height'>
                    <?php foreach($data as $item):
                        if($item['count'] !== 0):
                            $empty = false;
                            getHtml(__DIR__.'/../../partials/card-dash.php', ['title' => $item['title'], 'count' => $item['count'], 'model' => $item['model']]);
                        endif;
                    endforeach; ?>

                    <?php if($empty): ?>
                        <div class="p-2 empty-collections d-flex justify-content-center flex-column align-items-center col-12 col-md-5">
                            <h4 class="text-cm-secondary">Todas as cotações já foram respondidas!</h4>
                            <img class="h-100" src="<?php asset('assets/images/checked.svg') ?>" alt="Dashboard">
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </section>
    </section>

    <?php getHtml(__DIR__.'/../../partials/footer.php') ?>
</body>
</html>
