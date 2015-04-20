// ===================================================================================================
// Includes.
// ===================================================================================================
var gulp       = require('gulp');              // Gulp main package
var jshint     = require('gulp-jshint');       // Gulp plug-in for checking syntax error in JS files.
var changed    = require('gulp-changed');      // Gulp plug-in for helping gulp-imagemin.
var imagemin   = require('gulp-imagemin');     // Gulp plug-in for minify images.
var minifyCSS  = require('gulp-minify-css');   // Glup plug-in for minify'ing your CSS code.
var sass       = require('gulp-sass');         // Gulp plugin for sass compile.
var rename     = require('gulp-rename');       // Gulp plugin for renaming files.

// ===================================================================================================
// TASK METHODS.
// ===================================================================================================

// jshint check in the JAvascript files for syntax errors.
// [CLI Call] = gulp jshint
gulp.task('jshint', function() {
  gulp.src('resources/assets/js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// Minify new images
// [CLI Call] = gulp imagemin
gulp.task('imagemin', function() {
  var imgSrc = 'resources/assets/img/**/*';
  var imgDst = 'public/assets/img';

  gulp.src(imgSrc)
      .pipe(changed(imgDst))
      .pipe(imagemin())
      .pipe(gulp.dest(imgDst));
});

// Compile SASS to CSS
// [CLI Call] = gulp sass
gulp.task('sass', function() {
  gulp.src('./resources/assets/sass/master.scss')
      .pipe(sass({
          includePaths: ['./resources/assets/sass'],
          errLogToConsole: true
        }))
      .pipe(minifyCSS())
      .pipe(rename('master.min.css'))
      .pipe(gulp.dest('./public/css/'));
});

// ===================================================================================================
// WATCHER.
// ===================================================================================================

gulp.task('watch', function() {
  gulp.watch('./resources/assets/js/*.js', ['jshint']);
  gulp.watch('./resources/assets/sess/*.scss', ['sass']);
});
