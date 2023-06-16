const Mix = require("laravel-mix");


Mix
   .sass('public/libs/sass/style.scss', 'public/assets/css/style.css')
   .sass('public/libs/sass/globals.sass', 'public/assets/css/globals.css')

   .css('node_modules/bootstrap-icons/font/bootstrap-icons.css', 'public/libs/bootstrap/bootstrap-icons.css')

   .scripts('node_modules/jquery/dist/jquery.min.js', 'public/libs/jquery/jquery.js')
   .scripts('node_modules/jquery-mask-plugin/dist/jquery.mask.min.js', 'public/libs/jquery/jquery.mask.min.js')

   .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/libs/bootstrap/bootstrap.js')
   .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js.map', 'public/libs/bootstrap/bootstrap.js.map');
