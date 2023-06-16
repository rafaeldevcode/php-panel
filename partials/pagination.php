<section class='w-100 border-top border-2 border-dark'>
    <div class='pt-2 d-flex justify-content-between'>
        <form action="" method="POST">
            <?php if(!is_null($prev)): ?>
                <input type="hidden" name="page" value="<?php echo $prev ?>">
            <?php endif; ?>

            <?php if(!is_null($search)): ?>
                <input type="hidden" name="search" value="<?php echo $search ?>">
            <?php endif; ?>

            <button type="submit" title='Página anterior' class='btn btn-sm btn-cm-secondary <?php echo is_null($prev) ? 'disabled' : '' ?>'>
                <i class='bi bi-arrow-left-short'></i>
                Anterior
            </button>
        </form>

        <div class='d-flex'>
            <div class='px-2 me-1 border-top border-2 border-color-main'>
                <?php echo $page ?>
            </div>
            <div class='border-top border-2 border-cm-grey'>de <?php echo $count ?> páginas</div>
        </div>

        <form action="" method="POST">
            <?php if(!is_null($next)): ?>
                <input type="hidden" name="page" value="<?php echo $next ?>">
            <?php endif; ?>

            <?php if(!is_null($search)): ?>
                <input type="hidden" name="search" value="<?php echo $search ?>">
            <?php endif; ?>

            <button type="submit" title='Próxima página' class='btn btn-sm btn-cm-secondary <?php echo is_null($next) ? 'disabled' : '' ?>'>
                Próximo
                <i class='bi bi-arrow-right-short'></i>
            </button>
        </form>
    </div>
</section>
