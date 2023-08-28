<?php $width_height = $position == 'absolute' ? 'w-full h-full rounded' : 'screen-full screen-full'; ?>

<section class="section-preloader <?php echo $position ?> top-0 left-0 bg-light flex justify-center items-center <?php echo $width_height ?>" id="preloader-section">
    <div class="section-preloader-image">
        <img class="w-full" src="<?php asset('assets/images/preloaders/'.SETTINGS['preloader_image']) ?>" alt="Preloader">
    </div>
</section>
