const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

gulp.task('app', () => {
  gulp.src('sass/app.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false,
    }))
    .pipe(gulp.dest('./dist'));
});

gulp.task('fullpage', () => {
  gulp.src('sass/fullpage.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false,
    }))
    .pipe(gulp.dest('./dist'));
});

// Watch task
gulp.task('default', () => {
  gulp.watch('sass/**/*.scss', ['app']);
  gulp.watch('sass/**/*.scss', ['fullpage']);
});
