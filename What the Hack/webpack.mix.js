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
mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.postCss('resources/css/font-awesome.css', 'public/css');

mix.styles([
    'resources/css/bootstrap.css',
    'resources/css/summernote.css',
    'resources/css/summernote-ext-faicon.css'
    ], 'public/css/summernote.css');

mix.sass('resources/sass/app1.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js');

mix.combine([
    'resources/js/summernote.js',
    'resources/js/summernote-ext-faicon.js'
    ], 'public/js/summernote.js');
