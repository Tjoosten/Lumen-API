// =================================================================================================
// Includes.
// =================================================================================================
var gulp       = require('gulp');             // Gulp main package
var jshint     = require('gulp-jshint');      // Gulp plug-in for checking syntax error in JS files.
var changed    = require('gulp-changed');     // Gulp plug-in for helping gulp-imagemin.
var imagemin   = require('gulp-imagemin');    // Gulp plug-in for minify images.

// =================================================================================================
// TASK METHODS.
// =================================================================================================

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
  var imgSrc = 'resources/assets/img/**/*',
      imgDst = 'public/assets/img';

  gulp.src(imgSrc)
    .pipe(changed(imgDst))
    .pipe(imagemin())
    .pipe(gulp.dest(imgDst));
});
