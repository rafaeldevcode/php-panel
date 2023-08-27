<?php
    if(!isset($_SESSION)):
        session_start();
    endif;

    if(isset($_SESSION['message'])): ?>
        <div class='flex flex-row items-center fixed end-0 top-0 m-2 p-0 shadow-lg border border-<?php echo $_SESSION['type'] ?>  border-2 rounded bg-cm-light' data-message='true'>
            <div class="bg-<?php echo $_SESSION['type'] ?> py-1 px-2">
                <i class="bi <?php echo $_SESSION['type'] == 'cm-danger' ? 'bi-dash-circle-fill' : 'bi-check-circle-fill' ?> text-cm-light fs-5"></i>
            </div>
                
            <p class='m-0 px-2 text-<?php echo $_SESSION['type'] ?>'><?php echo $_SESSION['message'] ?></p>
        </div>
    <?php endif;

    unset($_SESSION['message']);
    unset($_SESSION['type']); ?>
