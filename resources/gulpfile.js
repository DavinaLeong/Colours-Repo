/**********************************************************************************
	- File Info -
		File name		: gulpfile.jpg
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 21 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
var gulp = require('gulp');

const NODE_PATH = './node_modules/';
const VENDOR_PATH = './vendor/';

gulp.task('copy', function()
{
    // --- Twitter Bootstrap start ---
    gulp.src([
        NODE_PATH + 'bootstrap/dist/css/bootstrap.min.css',
        NODE_PATH + 'bootstrap/dist/css/bootstrap.min.css.map'
    ]).pipe(gulp.dest(VENDOR_PATH + 'bootstrap/css'));
    gulp.src([
        NODE_PATH + 'bootstrap/dist/fonts/**'
    ]).pipe(gulp.dest(VENDOR_PATH + 'bootstrap/fonts'));
    gulp.src([
        NODE_PATH + 'bootstrap/dist/js/bootstrap.min.js'
    ]).pipe(gulp.dest(VENDOR_PATH + 'bootstrap/js'));
    // --- Twitter Bootstrap end ---


    // --- Font-Awesome start ---
    gulp.src([
        NODE_PATH + 'font-awesome/css/**',
        '!' + NODE_PATH + 'font-awesome/css/font-awesome.css'
    ]).pipe(gulp.dest(VENDOR_PATH + 'font-awesome/css'));

    gulp.src([
        NODE_PATH + 'font-awesome/fonts/**'
    ]).pipe(gulp.dest(VENDOR_PATH + 'font-awesome/fonts'));
    // --- Font-Awesome end ---


    // --- jQuery end ---
    gulp.src([
        NODE_PATH + 'jquery/dist/jquery.min.js',
        NODE_PATH + 'jquery/dist/jquery.min.map'
    ]).pipe(gulp.dest(VENDOR_PATH + 'jquery'));
    // --- jQuery end ---


    // --- Numeral end ---
    gulp.src([
        NODE_PATH + 'numeral/min/numeral.min.js'
    ]).pipe(gulp.dest(VENDOR_PATH + 'numeral'));
    // --- Numeral end ---


    // --- ParsleyJS end ---
    gulp.src([
        NODE_PATH + 'parsleyjs/dist/parsley.min.js',
        NODE_PATH + 'parsleyjs/dist/parsley.min.js.map'
    ]).pipe(gulp.dest(VENDOR_PATH + 'parsleyjs'));
    // --- ParsleyJS end ---
});