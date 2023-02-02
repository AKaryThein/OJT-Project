const gulp = require('gulp');  //Initialized Gulp
const sass = require('gulp-sass')(require('sass'));  //sass 
const autoprefixer = require("autoprefixer");  // Prefix CSS
const cssnano = require("cssnano"); // Minify CSS
const postcss = require("gulp-postcss"); // to pipe CSS through several plugins, but parse CSS only once.
const concat = require('gulp-concat'); // Concatenates files
const rename = require("gulp-rename"); // Rename files
const plumber = require("gulp-plumber"); // Prevent pipe breaking caused by errors from gulp plugins
const notify = require('gulp-notify'); // notifies the message whenever a task fails/correct.
const livereload = require('gulp-livereload'); // Live reload
const browsersync = require("browser-sync").create(); // Used to watch all HTML and CSS files in the CSS directory and performs the live reload to the page in all browsers, whenever files are changed

// Browser-sync task
gulp.task("browser-sync", async () => {
  browsersync.init({
    server: {
      baseDir: "dist"
    }
  });
});

// HTML task
gulp.task('html', async () => {
  return gulp
    .src('src/**/*.html')
    .pipe(gulp.dest('dist/'))
    .pipe(browsersync.stream())
    .pipe(livereload())
});

// CSS task
gulp.task('css', async () => {
  return gulp
    .src('src/scss/**/*.scss')
    .pipe(plumber())
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(gulp.dest('dist/css'))
    .pipe(notify({
      message: "main SCSS processed"
    }))
    .pipe(browsersync.stream())
    .pipe(livereload())
});

// JS Task
gulp.task('js', async () => {
  return gulp
    .src('src/js/**/*.js')
    .pipe(plumber())
    .pipe(concat('app.js'))
    .pipe(gulp.dest('dist/js'))
    .pipe(browsersync.stream())
    .pipe(livereload())
});

gulp.task("default", gulp.series("html", "css", "js", "browser-sync", async () => {
  livereload.listen();
  gulp.watch(["src/**/*"], gulp.series("html"));
  gulp.watch(["src/scss/**/*"], gulp.series("css"));
  gulp.watch(["src/js/**/*"], gulp.series("js"));
}));




