const { mix } = require('laravel-mix');

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

 mix.copy('resources/assets/fonts', 'public/fonts');
 
 mix.copy('resources/assets/img/favicon.png', 'public/img/favicon.png');
 mix.copy('resources/assets/img/icon.png', 'public/img/icon.png');

 mix.less('resources/assets/less/app.less', 'public/css/app.css');

 mix.version();