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

mix
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/guest.js', 'public/js')
    .js('resources/js/scan-qrcode.js', 'public/js')
    .js('resources/js/google.js', 'public/js')
    .js('resources/js/datatable.js', 'public/js')
    .js('resources/js/form-plugin.js', 'public/js')
    .sass('resources/scss/styles.scss', 'public/css')
    .sass('resources/scss/datatable.scss', 'public/css')
    .sass('resources/scss/form-plugin.scss', 'public/css')
    .disableNotifications()
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
