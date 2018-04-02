let mix = require('laravel-mix');
require('laravel-mix-purgecss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .purgeCss();

mix.styles(
    [
        'public/themes/wow/css/bootstrap.css',
        'public/themes/wow/css/style.css',
        'public/themes/wow/css/forms.css',
        'public/themes/wow/css/navigation.css',
        'public/themes/wow/css/font-awesome.min.css',
        'public/themes/wow/css/simple-sidebar.css',
        'public/themes/wow/css/jquery.bxslider.css',
    ])
    // 'public/themes/wow/css/all.css')
    // .js([
    //     'public/themes/wow/js/app.js',
    //     'public/themes/wow/js/bootstrap.min.js',
    //     'public/themes/wow/js/scripts.js',
    //     'public/themes/wow/js/modernizr.custom.57696.js',
    //     'public/themes/wow/js/jquery-scrolltofixed-min.js',
    //     'public/themes/wow/js/expand-nav.js',
    //     'public/themes/wow/js/hammer.js',
    //     'public/themes/wow/js/jquery.popupoverlay.js',
    //     'public/themes/wow/js/jquery.bxslider.min.js',
    // ], 'public/themes/wow/js/all.js')
    .purgeCss();