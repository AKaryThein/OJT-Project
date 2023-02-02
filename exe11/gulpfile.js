const { src, dest, watch } = require('gulp');
const pug = require('gulp-pug');
const sass = require('gulp-sass')(require('sass'));
const rename = require('gulp-rename');
const concat = require('gulp-concat');

function html() {
  return src("src/*.pug")
    .pipe(pug({ pretty: true }))
    //.pipe(rename({extname: ".php"}))  // rename file name
    .pipe(dest("dist"));
}

function css() {
  return src("src/css/*.scss")
    .pipe(sass().on('error', sass.logError))
    .pipe(dest("dist/css/"));
}

function js() {
  return src("src/js/*.js")
    .pipe(concat('script.js'))
    .pipe(dest('dist/js'));
}

//exports.html = html
//exports.css = css

exports.watch = function () {
  watch("src/*.pug", html);
  watch("src/css/*.scss", css);
  watch("src/js/*.js", js);
}