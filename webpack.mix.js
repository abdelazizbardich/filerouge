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

 mix.js('resources/js/vue/app.js', 'public/js').vue()
 .sass('resources/css/app.scss', 'public/css', [
     //
 ]);

 mix.js('resources/js/dashboard/main.js', 'public/js/dashboard')
 .sass('resources/css/dashboard/main.scss', 'public/css/dashboard', [
     //
 ]);
