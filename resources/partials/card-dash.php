<form action="/admin/filtros" method="POST" class="card cm-card my-3">
    <input type="hidden" name="status" value="on">
    <input type="hidden" name="form_safe" value="<?php echo $model ?>">
    <input type="hidden" name="start_date" value="">
    <input type="hidden" name="end_date" value="">

    <div class="card-header bg-cm-primary text-cm-light">
        <p class="fw-bold m-0"><?php echo $title ?></p>
    </div>

    <div class="card-body cm-card-body">
        <h5 class="text-cm-primary">Total não visualizados: <?php echo $count ?></h5>
    </div>
    
    <div class="card-footer bg-cm-light d-flex justify-content-end">
        <button type="submit" title="Visualizar" class="btn btn-sm btn-color-main text-cm-light">
            Visualizar
        </button>
    </div>
</form>
