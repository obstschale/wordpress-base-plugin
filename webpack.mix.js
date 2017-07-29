let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

/** Styles / Scripts for WordPress Base Plugin */
mix.js(['resources/js/wordpress-base-admin.js', 'resources/js/wordpress-base-plugin.js'], 'public/js/wordpress-base.js')
    .sass('resources/scss/site.scss', 'public/css/site.css');
