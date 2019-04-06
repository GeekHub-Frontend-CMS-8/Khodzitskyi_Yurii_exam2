var gulp        = require('gulp');
var sass        = require('gulp-sass');
var autoprefixer = require('autoprefixer');
var compass = require('compass-importer');
var postcss = require('gulp-postcss');
var sourcemaps = require('gulp-sourcemaps');
var cssnext = require('postcss-cssnext');
var shortcss = require('postcss-short');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

gulp.task('sass', function () {
    var plugins = [
        shortcss,
        cssnext,
        autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        })
    ];
	return gulp.src('sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({ importer: compass,
            outputStyle: 'compressed',
            includePaths: ['node_modules/susy/sass']
		}).on('error', sass.logError))
        .pipe(postcss(plugins))
        .pipe(sourcemaps.write())
		.pipe(gulp.dest('.'))

});
//script paths
var jsFiles = 'js/**/*.js',
    jsDest = 'js-min';

gulp.task('scripts', function() {
    return gulp.src(jsFiles)
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});

gulp.task("watch", ['sass','scripts'], function () {
    gulp.watch('sass/**/*.scss', ["sass"]);
    gulp.watch('js/**/*.js', ["scripts"]);
});
