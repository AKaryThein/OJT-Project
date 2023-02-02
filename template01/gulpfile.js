const gulp  = require("gulp");
const pug = require('gulp-pug');
const sass = require('gulp-sass')(require('sass'));
const livereload = require('gulp-livereload');
const browsersync = require('browser-sync').create();

gulp.task("browser-sync", async () => {
  browsersync.init({
    server: {
      baseDir: "dist"
    }
  });
});

gulp.task('html', async () => {
  return gulp
    .src('src/*.pug')
    .pipe(pug({ pretty: true }))
    .pipe(gulp.dest('dist/'))
    .pipe(browsersync.stream())
    .pipe(livereload())
});

gulp.task('font', async () => {
  return gulp
    .src('src/fonts/*.{ttf,woff,eof,svg}')
    .pipe(gulp.dest('dist/fonts'))
});

gulp.task('css', async () => {
  return gulp
    .src('src/scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('dist/css'))
    .pipe(browsersync.stream())
    .pipe(livereload())
  });

gulp.task('imageMin', async () => {
  return gulp
    .src('src/img/*.{jpg,png,svg}')
    .pipe(gulp.dest('dist/img'))
    .pipe(browsersync.stream())
    .pipe(livereload())
  });

gulp.task("default", gulp.series("html", "css", "font", "imageMin", "browser-sync", async () => {
  livereload.listen();
  gulp.watch(["src/**/*"], gulp.series("html"));
  gulp.watch(["src/scss/**/*"], gulp.series("css"));
  gulp.watch(["src/fonts/**/*"], gulp.series("font"));
  gulp.watch(["src/img/**/*"], gulp.series("imageMin"));
}));

