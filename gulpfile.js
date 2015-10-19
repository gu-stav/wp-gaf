var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('scripts', function() {
  return gulp.src([
          './bower_components/jquery/dist/jquery.js',
          './js/main.js',
        ])
    .pipe(concat('main-dist.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js/'));
});

gulp.task('default', ['scripts']);
