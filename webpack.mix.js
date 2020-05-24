const mix = require('laravel-mix');

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
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'resources/assets/css/material-dashboard.css',
    'resources/assets/css/material-dashboard-rtl.css',
    'resources/assets/css/demo/demo.css',

], 'public/css/libs.css');

mix.scripts([

    'resources/assets/js/core/jquery.min.js',
    'resources/assets/js/core/popper.min.js',
    'resources/assets/js/core/bootstrap-material-design.min.js',
    'resources/assets/js/plugins/perfect-scrollbar.jquery.min.js',
    'resources/assets/js/plugins/chartist.min.js',
    'resources/assets/js/plugins/bootstrap-notify.js',
    'resources/assets/js/material-dashboard.js',
    'resources/assets/demo/demo.js',
], 'public/js/libs.js');


mix.copyDirectory('resources/fonts', 'public/fonts');
