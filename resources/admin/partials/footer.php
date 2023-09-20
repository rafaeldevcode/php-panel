<footer class='p-4 border-t shadow-lg'>
    <div class='flex flex-col lg:flex-row justify-between items-center'>
        <p class='font-bold text-secondary text-center'><?php echo !is_null(SETTINGS) && !empty(['copyright']) ? SETTINGS['copyright'] : 'Todos os direitos reservados' ?></p>
    
        <a title="Políticas de privacidade" class="font-bold text-secondary" href="<?php route('/policies') ?>">Políticas de privacidade</a>
    </div>
</footer>
