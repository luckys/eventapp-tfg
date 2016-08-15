var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'superfish.css',
        'bootstrap-datepicker.min.css',
        'cs-select.css',
        'cs-skin-border.css',
        'icomoon.css',
        'flexslider.css',
        'style.css'
    ]);
});

elixir(function(mix) {
    mix.browserify('main.js');
});

elixir(function(mix) {
    mix.scripts([
        'hoverIntent.js',
        'superfish.js',
        'jquery.waypoints.min.js',
        'jquery.countTo.js',
        'jquery.stellar.min.js',
        'bootstrap-datepicker.min.js',
        'classie.js',
        'selectFx.js',
        'jquery.flexslider-min.js',
        'custom.js'
    ]);
});

elixir(function(mix) {
    mix.phpUnit();
});
