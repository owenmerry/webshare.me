const elixir = require('laravel-elixir');

//require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass(
        'app.scss'
    )
    
        .styles([
        'frameworks/bootstrap/css/bootstrap.min.css',
        'frameworks/bootswatch_flat/bootswatch_flat.min.css',
        'frameworks/fontawesome/css/font-awesome.min.css',
        'frameworks/animate.css/animate.css',
        './public/css/app.css' 
        
    ])
    
    
        .scripts([
        
        'frameworks/angular/angular.min.js',
        'frameworks/angular-route/angular-route.min.js',
        'frameworks/angular-animate/angular-animate.min.js',
        '../../../node_modules/moment/min/moment.min.js',
        '../../../node_modules/angular-moment/angular-moment.min.js', 
        'angular/controller.js',
        'angular/route.js'
        
    ]) 
    
        .version(['css/all.css', 'js/all.js'])
        .copy('resources/assets/css/frameworks/font-awesome/fonts', 'public/fonts');
    ;
});




