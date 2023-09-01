<?php loadHtml(__DIR__.'/partials/head', ['title' => $title, 'plugins' => isset($plugins) ? $plugins : []]) ?>

    <section class='flex flex-nowrap justify-between w-full'>
        <?php loadHtml(__DIR__.'/partials/sidebar') ?>

        <section class='w-full'>
            <?php loadHtml(__DIR__.'/partials/header') ?>

            <?php loadHtml(__DIR__.'/partials/breadcrumps', [
                'color' => $color,
                'type' => $type,
                'icon' => $icon,
                'title' => $title,
                'route_delete' => isset($route_delete) ? $route_delete : null,
                'route_add' => isset($route_add) ? $route_add : null,
                'route_search' => isset($route_search) ? $route_search : null,
            ]) ?>

            <?php loadHtml($body, isset($data) ? $data : []) ?>
        </section>
    </section>

    <?php loadHtml(__DIR__.'/partials/footer', ['plugins' => isset($plugins) ? $plugins : []]) ?>

    <?php if(function_exists('loadInFooter')) loadInFooter(); ?>
</body>
</html>
