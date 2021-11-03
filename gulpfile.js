/* Paths variables */
var basepath = {
	src: 'source/',
	root: 'htdocs/',
	dest: 'htdocs/html/'
};
var path = {
	build: {
		js:    'htdocs/f/js/',
		css:   'htdocs/f/css/',
	},
	src: {
		js: basepath.src + 'scripts/',
		pug: basepath.src +  '*.pug',
		css: basepath.src + 'css/*.css',
		stylus: basepath.src + '/stylus/**/*',
	},
	watch: {
		js: basepath.src + 'scripts/**/*.js',
		pug: basepath.src + '**/*.pug',
		css: basepath.src + 'css/**/*.css',
		stylus: basepath.src + '/stylus/**/*',
	}
};

/*
	Let the magic begin
*/
var gulp = require('gulp'),
	browserSync = require('browser-sync'),
	pug = require('gulp-pug'),
	stylus = require('gulp-stylus'),
	postcss = require('gulp-postcss'),
	autoprefixer = require('autoprefixer'),
	plumber = require("gulp-plumber"),
	watch = require('gulp-watch'),
	cleanCSS = require('gulp-clean-css'),
	babel = require('gulp-babel'),
	reload = browserSync.reload;

var postProcessors = [
	autoprefixer({browsers: ['last 5 version']})
];

/* Pug templates */
gulp.task('pug', function(){
	return gulp.src(path.src.pug)
		.pipe(plumber())
		.pipe(pug({
			pretty: true
		}))
		.pipe(gulp.dest(basepath.dest))
		.pipe(reload({stream: true}));
});


/* css */
gulp.task('css', function() {
	return gulp.src(path.src.css)
		.pipe(gulp.dest(path.build.css))
		.pipe(reload({stream: true}));
});

/* stylus */
gulp.task('stylus', function() {
	return gulp.src(['source/stylus/*.styl'])
		.pipe(plumber())
		.pipe(stylus())
		.on('error', console.log)
		.pipe(postcss(postProcessors))
		.pipe(cleanCSS())
		.pipe(gulp.dest(path.build.css))
		.pipe(reload({stream: true}));
});

/* JS */
gulp.task('vendorjs', function() {
	return gulp.src(path.src.js+"vendor/*.js")
		.pipe(gulp.dest(path.build.js+"vendor/"))
		.pipe(reload({stream: true}));
});

gulp.task('userjs', function() {
	return gulp.src(path.src.js+"*.js")
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(gulp.dest(path.build.js))
		.pipe(reload({stream: true}));
});


/* server */
gulp.task('serve', ['stylus'], function() {

	browserSync.init({
		server: {
			baseDir: basepath.root
		},
		notify: false,
	});

	gulp.watch(path.watch.pug, ['pug']);
	gulp.watch(path.watch.css, ['css']);
	gulp.watch(path.watch.stylus, ['stylus']);
	gulp.watch(path.watch.js, ['vendorjs', 'userjs']);
	gulp.watch("htdocs/*.html").on('change', browserSync.reload);
});


/* default actions */
gulp.task('default', ['serve']);

gulp.task('build', ['pug', 'css', 'stylus', 'vendorjs', 'userjs']);
