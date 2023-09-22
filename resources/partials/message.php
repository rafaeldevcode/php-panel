<?php
    if(!isset($_SESSION)):
        session_start();
    endif;

    if(isset($_SESSION['message'])): ?>
        <div class="fixed top-0 right-0 rounded p-4 z-[99999] text-white font-bold w-[400px]" data-message="content">
            <div class="rounded shadow-lg p-4 flex items-center relative my-1 bg-<?php echo $_SESSION['type'] ?>" data-message="true">
                <i class="<?php echo getIconMessage($_SESSION['type']) ?> text-xl"></i>
                <p class="ml-4 text-sm"><?php echo $_SESSION['message'] ?></p>
                <i class="bi bi-x absolute top-0 right-1 opacity-75 pointer" data-message="hide"></i>
            </div>
        </div>
    <?php endif;

    unset($_SESSION['message']);
    unset($_SESSION['type']); 
?>
