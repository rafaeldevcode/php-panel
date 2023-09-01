<footer class='p-4 border-t shadow-lg'>
    <div class='flex flex-col lg:flex-row justify-between items-center'>
        <p class='font-bold text-secondary text-center'><?php echo !is_null(SETTINGS) && !empty(['copyright']) ? SETTINGS['copyright'] : 'Todos os direitos reservados' ?></p>
    
        <a title="Políticas de privacidade" class="font-bold text-secondary" href="<?php route('/policies') ?>">Políticas de privacidade</a>
    </div>
</footer>

<script type="text/javascript" src="<?php asset('libs/jquery/jquery.js?ver='.APP_VERSION)?>"></script>
<script type="text/javascript" src="<?php asset('libs/bootstrap/bootstrap.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/main.js?ver='.APP_VERSION) ?>"></script>

<script type="text/javascript" src="<?php asset('assets/scripts/class/Modal.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Cookies.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/PageBack.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Preloader.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Menu.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Message.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Password.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/ValidateForm.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript" src="<?php asset('assets/scripts/class/Remove.js?ver='.APP_VERSION) ?>"></script>
<script type="text/javascript">
    Menu.checkIsOpen();
    Menu.admin($('#checkbox-menu'));
    Message.hide('[data-message]');
    Password.show('[data-id-pass]');

    // Validate the form
    const validate = new ValidateForm();
    validate.init();

    // Delete item(s)
    const remove = new Remove();
    remove.init();

    PageBack.init();

    document.addEventListener("DOMContentLoaded", function() {
        Preloader.hide();
    });

    Modal.init();
</script>

<?php if(isset($plugins) && in_array('tinymce', $plugins)): ?>
    <!-- Tinymce start -->
    <script type="text/javascript" src="<?php asset('libs/tinymce/themes/silver/theme.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/models/dom/model.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/icons/default/icons.js?ver='.APP_VERSION) ?>"></script>

    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/image/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/codesample/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/emoticons/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/emoticons/js/emojis.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/charmap/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/autolink/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/anchor/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/wordcount/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/visualblocks/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/table/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/searchreplace/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/media/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/lists/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/link/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('libs/tinymce/plugins/code/plugin.min.js?ver='.APP_VERSION) ?>"></script>
    <!-- Tinymce end -->
<?php endif ?>
