<?php if ($header) { ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $pixel ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo $pixel ?>');
    </script>
<?php } else { ?>

<?php } ?>
