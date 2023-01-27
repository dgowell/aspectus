'use strict';
var gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
var concat = require('gulp-concat');
sass.compiler = require('node-sass');

function build() {
    return gulp.src('./sass/**/*.scss')
        .pipe(concat('custom.scss'))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/'));
}
exports.default = build;