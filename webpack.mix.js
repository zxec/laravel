const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .styles([
        'resources/css/libs/bootstrap.min.css',
        'resources/css/app.css',
        'resources/css/libs/select2.min.css'
    ], 'public/css/output.css')
    .scripts([
        'resources/js/libs/jquery-3.6.3.min.js',
        'resources/js/libs/bootstrap.bundle.min.js',
        'resources/js/libs/select2.min.js'
    ], 'public/js/output.js');
