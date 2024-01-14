const mix = require('laravel-mix');
const {postCss} = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js('resources/js/back/back.js', 'public/js/back')
    .js('resources/js/front/app.js', 'public/js/front')
    .js('resources/js/back/main.js', 'public/js/back/main.js')


    .sass('resources/sass/back/back.scss', 'public/css/back')
    .sass('resources/sass/front/app.scss', 'public/css/front')
    .sourceMaps();





mix.copyDirectory('node_modules/tinymce/icons', 'public/node_modules/tinymce/icons');
mix.copyDirectory('node_modules/tinymce/models', 'public/node_modules/tinymce/models');
mix.copyDirectory('node_modules/tinymce/plugins', 'public/node_modules/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/node_modules/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/node_modules/tinymce/themes');
mix.copy('node_modules/tinymce/tinymce.js', 'public/node_modules/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/node_modules/tinymce/tinymce.min.js');
