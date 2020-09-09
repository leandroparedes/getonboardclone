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

mix.js('app/Applications/ForCompanies/Frontend/Js/app.companies.js', 'public/js/companies/app.companies.js');
mix.js('app/Applications/ForProfessionals/Frontend/Js/app.professionals.js', 'public/js/professionals/app.professionals.js');
