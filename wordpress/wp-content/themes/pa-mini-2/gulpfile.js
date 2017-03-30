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
	es6: ['src/js/**/*.js']
};

/**
 * CSS TASKS
 */

gulp.task('sass-dev', function () {
	return gulp.src(PATHS.sass)
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream());
});


gulp.task('sass-dist', function () {
	return gulp.src(PATHS.sass)
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./'));
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


/**
 * RUN GULP TASKS
 * default, watch, dist, prod
 */
gulp.task('default', ['watch']);

gulp.task('watch', ['sass-dev', 'js-dev'], function () {
	gulp.watch(PATHS.sass, ['sass-dev']);
	gulp.watch(PATHS.es6, ['js-dev']);
	// Other watchers can also be added here
});

gulp.task('dist', ['sass-dist', 'js-dist']);