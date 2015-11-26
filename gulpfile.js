var gulp = require('gulp');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var sass = require('gulp-sass');

gulp.task('browserify', function(){
	browserify('./dev/js/main.js')
		.bundle()
		.pipe(source('main.js'))
		.pipe(gulp.dest('prod/js'));
	browserify('./dev/js/admin.js')
		.bundle()
		.pipe(source('admin.js'))
		.pipe(gulp.dest('prod/js'));	
});

gulp.task('copy', function(){
	gulp.src('dev/*.*')
		.pipe(gulp.dest('prod'));
	gulp.src('dev/php/*.*')
		.pipe(gulp.dest('prod/php'));
	gulp.src('dev/admin/*.*')
		.pipe(gulp.dest('prod/admin'));	
	gulp.src('dev/assets/**/*.*')
		.pipe(gulp.dest('prod/assets'));
	gulp.src('dev/API/**/*.php')
		.pipe(gulp.dest('prod/API'));	
});

gulp.task('styles', function() {
    gulp.src('dev/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('prod/css'));
});

gulp.task('default', ['browserify', 'copy', 'styles'], function(){
	gulp.watch('dev/sass/**/*.scss',['styles']);
	return gulp.watch('dev/**/*.*', ['browserify', 'copy']);
});