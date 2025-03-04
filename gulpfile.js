import gulp from 'gulp';
import watch from 'gulp-watch';
import cleanCSS from 'gulp-clean-css';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';

// Minify JavaScript
gulp.task('minify-scripts', function (done) {
  console.log('Starting minify-scripts task');
  return gulp.src('assets/js/scripts/*.js')
    .pipe(concat('scripts.min.js'))
    .pipe(uglify().on('error', function (err) {
      console.error('Uglify error:', err.toString());
      this.emit('end');
    }))
    .pipe(gulp.dest('assets/js'))
    .on('end', function () {
      console.log('minify-scripts task completed');
      done();
    });
});

// Combine, minify, and autoprefix CSS
gulp.task('minify-css', function () {
  console.log('Starting minify-css task');
  return gulp.src('assets/css/*.css')
    .pipe(concat('style.css')) // Изменил style-rtl.css → style.css
    .pipe(postcss([autoprefixer()]))
    .pipe(cleanCSS())
    .pipe(gulp.dest('.'));
});

// Watch task to run minify-js and minify-css on file changes
gulp.task('watch', function () {
  console.log('Watching files...');
  watch('assets/js/scripts/*.js', gulp.series('minify-scripts'));
  watch('assets/css/*.css', gulp.series('minify-css'));
});

// Default task to run watch
gulp.task('default', gulp.series('watch'));
