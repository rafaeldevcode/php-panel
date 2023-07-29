<?php $width_height = $position == 'absolute' ? 'w-100 h-100 rounded' : 'vw-100 vh-100'; ?>

<section class="section-preloader position-<?php echo $position ?> top-0 left-0 bg-cm-light d-flex justify-content-center align-items-center <?php echo $width_height ?>" id="preloader-section">
    <div class="section-preloader-image">
        <img class="w-100" src="<?php asset('assets/images/preloaders/'.SETTINGS['preloader_image']) ?>" alt="Preloader">
    </div>
</section>
