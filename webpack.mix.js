const mix = require('laravel-mix');
require("laravel-mix-vue3");

mix.vue3('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
