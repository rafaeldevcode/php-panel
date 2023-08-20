<section class='p-3'>
    <div class='border-bottom d-flex justify-content-between flex-column flex-md-row align-items-start align-items-md-end'>
        <div>
            <div class="breadcrumps-overflow">
                <ul class='p-0 d-flex flex-nowrap text-cm-secondary list-unstyled'>
                    <li class='me-2'><span class='badge bg-<?php echo $color ?> rounded-fill'><?php echo $type ?></span></li>
                    <?php foreach(normalizeBreadcrumps() as $breadcrump): ?>
                        <li class='mx-2'>
                            <a class='text-cm-secondary text-decoration-none badge bg-cm-grey rounded-pill px-3' href='<?php route($breadcrump['path']) ?>'><?php echo $breadcrump['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class='d-flex frex-nowrap mb-2'>
                <button type='button' id='back' title='Voltar a página anterior' class='btn btn-sm btn-color-main me-1 text-cm-light ms-1'>
                    <i class="bi bi-arrow-bar-left"></i>
                </button>
                <span class='bg-color-main rounded d-block d-flex justify-content-center align-items-center px-2 me-1'>
                    <i class='<?php echo $icon ?> text-cm-light fs-2'></i>
                </span>
                <p class='fs-2 fw-bold text-cm-secondary m-0'><?php echo $title ?></p>
            </div>
        </div>

        <div class='d-flex flex-column flex-sm-row mb-3 mx-auto mx-md-0'>
            <div class='d-flex justify-content-center'>
                <div class="mx-1">
                    <?php if(isset($route_search)): ?>
                        <?php loadHtml(__DIR__.'/form/input-search', ['route' => $route_search]) ?>
                    <?php endif; ?>
                </div>

                <?php if(isset($route_delete)): ?>
                    <button data-button="delete-several" id='deleteAll' type='button' title='Remover vários(a) <?php echo $title ?>' class='btn btn-sm btn-cm-danger mx-1 disabled text-cm-light' data-route='<?php route($route_delete) ?>'>
                        Remover
                    </button>
                <?php endif; ?>

                <?php if(isset($route_add)): ?>
                    <a href='<?php route($route_add) ?>' title='Adicionar <?php echo $title ?>' class='d-flex align-items-center btn btn-sm btn-cm-primary mx-1 text-cm-light'>Adicionar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if(isset($sub_options)): ?>
        <div class="bg-cm-secondary">
            <?php loadHtml($sub_options) ?>
        </div>
    <?php endif; ?>
</section>
