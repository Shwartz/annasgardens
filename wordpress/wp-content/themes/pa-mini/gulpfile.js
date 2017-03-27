"use strict";

const PATH = require("path");
const gulp = require('gulp');
const sass = require('gulp-sass');
const gutil = require('gulp-util');
const babel = require('gulp-babel');
const loader = require('babel-loader');
const replace = require('gulp-replace');
const sourcemaps = require('gulp-sourcemaps');
const webpack = require('webpack');
const webpackConfig = require('./webpack.config');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;

const PATHS = {
	sass: ['src/scss/**/*.scss'],
	es6: ['src/js/**/*.js'],
	html: ['src/web/**/*.html']
};

/**
 * CSS TASKS
 */


gulp.task('sass-dev', function () {
	return gulp.src(PATHS.sass)
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(replace(/@path@/ig, '../..'))
		.pipe(gulp.dest('dev/css'))
		.pipe(browserSync.stream());
});


gulp.task('sass-dist', function () {
	return gulp.src(PATHS.sass)
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(replace(/@path@/ig, '../..'))
		.pipe(gulp.dest('dist/css'));
});

gulp.task('sass-prod', function () {
	return gulp.src(PATHS.sass)
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(replace(/@path@/ig, '/img'))
		.pipe(gulp.dest('../../app/webroot/css'));
});

/**
 * JAVASCRIPT TASKS
 */

gulp.task('js-dev', function () {
	webpack(webpackConfig, function (err, stats) {
		if (err) throw new gutil.PluginError('webpack', err);
		gutil.log('[webpack]', stats.toString({
			colors: true,
			progress: true
		}));
	});
});

gulp.task('js-dist', function () {
	webpackConfig.plugins = [
		new webpack.optimize.DedupePlugin(),
		new webpack.optimize.UglifyJsPlugin({
			compress: {
				dead_code: true,
				global_defs: {
					DEBUG: false
				}
			}
		})
	];

	webpackConfig.output = {
		path: PATH.resolve(__dirname, 'dist/js'),
		filename: 'bundle.min.js'
	};

	// run webpack
	webpack(webpackConfig, function (err, stats) {
		if (err) throw new gutil.PluginError('webpack', err);
		gutil.log('[webpack]', stats.toString({
			colors: true,
			progress: true
		}));
	});
});

gulp.task('js-prod', function () {
	webpackConfig.plugins = [
		new webpack.optimize.DedupePlugin(),
		new webpack.optimize.UglifyJsPlugin({
			compress: {
				dead_code: true,
				global_defs: {
					DEBUG: false
				}
			}
		})
	];

	webpackConfig.output = {
		path: PATH.resolve(__dirname, '../../app/webroot/js'),
		filename: 'bundle.min.js'
	};

	// run webpack
	webpack(webpackConfig, function (err, stats) {
		if (err) throw new gutil.PluginError('webpack', err);
		gutil.log('[webpack]', stats.toString({
			colors: true,
			progress: true
		}));
	});
});

/**
 * SERVER TASKS
 */

gulp.task('browserSync', function () {
	browserSync.init({
		server: {
			baseDir: ''
		},
		startPath: 'src/web/'
	})
});

/**
 * Utility to create index file with a list of all files - TOC
 * */
gulp.task('create-toc', function () {
	let fs = require('fs');
	let fileList = '';

	fs.readdir('src/web', function (err, files) {
		files.forEach(function (file) {
			fileList += '<li><a href="' + file + '">' + file + '</a></li>';
		});

		fs.writeFileSync('src/web/index.html', '<html><head></head><body><h3>Content</h3><ul>' + fileList + '</ul></body></html>');
	});
});

/**
 * RUN GULP TASKS
 * default, watch, dist, prod
 */
gulp.task('default', ['browserSync', 'create-toc', 'watch']);

gulp.task('watch', ['sass-dev', 'js-dev'], function () {
	gulp.watch(PATHS.sass, ['sass-dev', reload]);
	gulp.watch(PATHS.es6, ['js-dev']);
	gulp.watch(PATHS.html, reload);
	// Other watchers can also be added here
});

gulp.task('watch-prod', ['sass-prod', 'js-prod'], function () {
	gulp.watch(PATHS.sass, ['sass-prod']);
	gulp.watch(PATHS.es6, ['js-prod']);
});

gulp.task('dist', ['sass-dist', 'js-dist']);
gulp.task('prod', ['sass-prod', 'js-prod']);