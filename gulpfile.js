

/* 
Author: Yc Ang

Installation :
1. read http://laravel.com/docs/5.0/elixir#gulp

2. install gulp dependency
npm install gulp gulp-less gulp-sass gulp-minify-css gulp-concat gulp-uglify gulp-rename gulp-phpunit --save-dev

command list :
1. watch file save event changes and compile css
gulp --production

*/
var gulp      = require('gulp');
var rename    = require('gulp-rename');
var minifyCss = require('gulp-minify-css');
var elixir    = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(function (mix) {

	mix.styles([
        "style.css",
        "animate.css", 
        "jquery.fullPage.css", 
        "slick.css",
        "slick-theme.css",
        "custom.css",
    ], 'public/css/all.css', 'public/css');

    mix.scripts([
        'admin/admin.js',
    ], 'public/js/admin.js');

    mix.scripts([
        'admin/ngServices/**/*.js'
    ], 'public/js/admin-service.js');

    mix.scripts([
        'admin/ngControllers/**/*.js'
    ], 'public/js/admin-controller.js');
});   
 
// gulp.task('default', ['watch']);