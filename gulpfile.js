let gulp = require('gulp'),
    cleanCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    changed = require('gulp-changed')

let _ = require('lodash');

const cssList = [
    // Libraries
    "node_modules/bootstrap/dist/css/bootstrap.css",

    "assets/css/style.css"
]

const jsList = [
    // Libraries
    "node_modules/jquery/dist/jquery.js",
    "node_modules/jquery-ui-dist/jquery-ui.js",
    "node_modules/bootstrap/dist/js/bootstrap.js",
    "node_modules/vue/dist/vue.js",
    "node_modules/axios/dist/axios.js"
]

const webAssetsDir = 'public/build/'

gulp.task('buildCss', function () {
    gulp.src(cssList)
        .pipe(cleanCSS({debug: true}))
        .pipe(concat('nptunnel.css'))
        .pipe(gulp.dest(webAssetsDir+'css/'))
})

gulp.task('buildJs', function () {
    gulp.src(jsList)
        .pipe(concat('nptunnel.js'))
        .pipe(uglify())
        .pipe(gulp.dest(webAssetsDir+'js/'))
})

gulp.task('default', ['buildCss', 'buildJs'])